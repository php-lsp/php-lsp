<?php

declare(strict_types=1);

namespace Lsp\Rpc\Protocol;

use Lsp\Contracts\Rpc\Protocol\DecoderInterface;
use Lsp\Contracts\Rpc\Protocol\EncoderInterface;
use Lsp\Rpc\Protocol\Exception\DecodingException;
use Lsp\Contracts\Rpc\Protocol\Exception\DecodingExceptionInterface;
use Lsp\Rpc\Protocol\Exception\DependencyRequiredException;
use Lsp\Rpc\Protocol\Exception\EncodingException;
use Lsp\Rpc\Protocol\Exception\InvalidFieldTypeException;
use Lsp\Rpc\Protocol\Exception\InvalidFieldValueException;
use Lsp\Rpc\Protocol\Exception\RequiredFieldNotDefinedException;
use Lsp\Rpc\Protocol\JsonRPC\Signature;
use Lsp\Contracts\Rpc\Message\FailureResponseInterface;
use Lsp\Rpc\Message\Factory\IdFactory;
use Lsp\Contracts\Rpc\Message\Factory\IdFactoryInterface;
use Lsp\Contracts\Rpc\Message\IdInterface;
use Lsp\Contracts\Rpc\Message\MessageInterface;
use Lsp\Contracts\Rpc\Message\NotificationInterface;
use Lsp\Rpc\Message\Factory\RequestFactory;
use Lsp\Contracts\Rpc\Message\Factory\RequestFactoryInterface;
use Lsp\Contracts\Rpc\Message\RequestInterface;
use Lsp\Rpc\Message\Factory\ResponseFactory;
use Lsp\Contracts\Rpc\Message\Factory\ResponseFactoryInterface;
use Lsp\Contracts\Rpc\Message\ResponseInterface;
use Lsp\Contracts\Rpc\Message\SuccessfulResponseInterface;

final class JsonRPCv2 implements EncoderInterface, DecoderInterface
{
    /**
     * - JSON_BIGINT_AS_STRING: This flag adds support for converting large
     *   numbers to strings. Such problems can arise, for example, if the
     *   code runs on the x86 platform and receives an int64 message
     *   identifier.
     */
    public const DEFAULT_JSON_FLAGS_DECODE = \JSON_BIGINT_AS_STRING;

    /**
     * - JSON_UNESCAPED_UNICODE: This flag allows UTF chars instead "\x0000"
     *   sequences which greatly reduces the amount of transmitted information
     *   in case unicode sequences are transmitted.
     */
    public const DEFAULT_JSON_FLAGS_ENCODE = \JSON_UNESCAPED_UNICODE;

    /**
     * @var int<1, 2147483647>
     */
    public const DEFAULT_JSON_DEPTH = 64;

    private readonly RequestFactoryInterface $requests;

    private readonly ResponseFactoryInterface $responses;

    private readonly IdFactoryInterface $ids;

    /**
     * @param int<1, 2147483647> $jsonMaxDepth
     */
    public function __construct(
        RequestFactoryInterface $requests = null,
        ResponseFactoryInterface $responses = null,
        IdFactoryInterface $ids = null,
        private readonly Signature $signature = Signature::ALL,
        private readonly int $jsonEncodingFlags = self::DEFAULT_JSON_FLAGS_ENCODE,
        private readonly int $jsonDecodingFlags = self::DEFAULT_JSON_FLAGS_DECODE,
        private readonly int $jsonMaxDepth = self::DEFAULT_JSON_DEPTH,
    ) {
        $this->requests = $requests ?? $this->createRequestFactory();
        $this->responses = $responses ?? $this->createResponseFactory();
        $this->ids = $ids ?? $this->createIdFactory();
    }

    private function createRequestFactory(): RequestFactoryInterface
    {
        if (\class_exists(RequestFactory::class)) {
            return new RequestFactory();
        }

        throw DependencyRequiredException::fromMissingRequestFactoryImplementation();
    }

    private function createResponseFactory(): ResponseFactoryInterface
    {
        if (\class_exists(ResponseFactory::class)) {
            return new ResponseFactory();
        }

        throw DependencyRequiredException::fromMissingResponseFactoryImplementation();
    }

    private function createIdFactory(): IdFactoryInterface
    {
        if (\class_exists(IdFactory::class)) {
            return new IdFactory();
        }

        throw DependencyRequiredException::fromMissingIdFactoryImplementation();
    }

    /**
     * Converts JSON-RPC message into the JSON string.
     *
     * @throws EncodingException
     */
    public function encode(MessageInterface $message): string
    {
        $data = match (true) {
            $message instanceof RequestInterface => [
                'id' => $message->getId()->toPrimitive(),
                'method' => $message->getMethod(),
                'params' => $message->getParameters(),
            ],
            $message instanceof NotificationInterface => [
                'method' => $message->getMethod(),
                'params' => $message->getParameters(),
            ],
            $message instanceof FailureResponseInterface => [
                'id' => $message->getId()->toPrimitive(),
                'error' => [
                    'code' => $message->getCode(),
                    'message' => $message->getMessage(),
                    'data' => $message->getData(),
                ],
            ],
            $message instanceof SuccessfulResponseInterface => [
                'id' => $message->getId()->toPrimitive(),
                'result' => $message->getResult(),
            ],
            default => throw new \InvalidArgumentException(
                \sprintf('Unsupported message type: %s', $message::class),
            ),
        };

        if ($this->signature->shouldInsert()) {
            $data['jsonrpc'] = '2.0';
        }

        return $this->toJson($data);
    }

    /**
     * Converts variant payload into json string.
     *
     * @param array<array-key, mixed> $data
     */
    private function toJson(array $data): string
    {
        try {
            return \json_encode($data, \JSON_THROW_ON_ERROR | $this->jsonEncodingFlags, $this->jsonMaxDepth);
        } catch (\Throwable $e) {
            throw EncodingException::fromInternalEncodingError($e->getMessage(), (int) $e->getCode());
        }
    }

    /**
     * @throws DecodingExceptionInterface
     */
    public function decode(string $data): MessageInterface
    {
        $array = $this->fromJson($data);

        if ($this->signature->shouldValidate()) {
            if (!\array_key_exists('jsonrpc', $array)) {
                throw RequiredFieldNotDefinedException::fromField('jsonrpc');
            }

            if ($array['jsonrpc'] !== '2.0') {
                throw InvalidFieldValueException::fromValueOfField('jsonrpc', '"2.0"', $array['jsonrpc']);
            }
        }

        // Check "method" field existing
        if (\array_key_exists('method', $array)) {
            return $this->tryDecodeRequest($array);
        }

        // @phpstan-ignore-next-line : Do not check array structure in this line
        return $this->tryDecodeResponse($array);
    }

    /**
     * @return array<array-key, mixed>
     */
    private function fromJson(string $json): array
    {
        try {
            $flags = \JSON_THROW_ON_ERROR | $this->jsonDecodingFlags;

            return (array) \json_decode($json, true, $this->jsonMaxDepth, $flags);
        } catch (\Throwable $e) {
            throw DecodingException::fromInternalDecodingError($e->getMessage(), (int) $e->getCode());
        }
    }

    /**
     * @param array{
     *  id?: mixed,
     *  method: mixed,
     *  params?: mixed,
     * } $data
     *
     * @throws DecodingException
     */
    private function tryDecodeRequest(array $data): NotificationInterface
    {
        // The "method" must be a string
        if (!\is_string($data['method']) || $data['method'] === '') {
            throw InvalidFieldTypeException::fromTypeOfField('method', 'non-empty-string', $data['method']);
        }

        // The "params" required
        if (!\array_key_exists('params', $data)) {
            $data['params'] = [];
        }

        // The "params" must be an array or object
        if (!\is_object($data['params']) && !\is_array($data['params'])) {
            throw InvalidFieldTypeException::fromTypeOfField('params', 'array|object', $data['params']);
        }

        $data['params'] = (array) $data['params'];

        if (\array_key_exists('id', $data)) {
            return $this->requests->createRequest(
                method: $data['method'],
                parameters: $data['params'],
                id: $this->tryDecodeId($data['id']),
            );
        }

        return $this->requests->createNotification(
            method: $data['method'],
            parameters: $data['params'],
        );
    }

    /**
     * @template T of mixed
     * @param T $id
     * @return IdInterface<T>
     * @throws DecodingException
     */
    private function tryDecodeId(mixed $id): IdInterface
    {
        try {
            return $this->ids->create($id);
        } catch (\Throwable) {
            throw InvalidFieldTypeException::fromTypeOfField('id', 'int|string', $id);
        }
    }

    /**
     * @template TIdentifier of mixed
     *
     * @param array{
     *  id?: TIdentifier,
     *  result?: mixed,
     *  error?: mixed | array{
     *      code?: mixed,
     *      message?: mixed,
     *      data?: mixed
     *  }
     * } $data
     *
     * @return ResponseInterface<TIdentifier>
     * @throws DecodingException
     */
    private function tryDecodeResponse(array $data): ResponseInterface
    {
        // The "id" required
        if (!\array_key_exists('id', $data)) {
            throw RequiredFieldNotDefinedException::fromField('id');
        }

        if (\array_key_exists('error', $data)) {
            return $this->tryDecodeErrorResponse($data);
        }

        return $this->tryDecodeSuccessResponse($data);
    }

    /**
     * @template TIdentifier of mixed
     *
     * @param array{
     *  id: TIdentifier,
     *  error: mixed | array{
     *      code?: mixed,
     *      message?: mixed,
     *      data?: mixed
     *  }
     * } $data
     *
     * @return FailureResponseInterface<TIdentifier, mixed>
     * @throws DecodingException
     */
    private function tryDecodeErrorResponse(array $data): FailureResponseInterface
    {
        // The "error" must be an object
        if (!\is_array($data['error'])) {
            throw InvalidFieldTypeException::fromTypeOfField('error', 'object', $data['error']);
        }

        // The "error.code" must be an int
        if (\array_key_exists('code', $data['error']) && !\is_int($data['error']['code'])) {
            throw InvalidFieldTypeException::fromTypeOfField('error.code', 'int', $data['error']['code']);
        }

        // The "error.message" must be a string
        if (\array_key_exists('message', $data['error']) && !\is_string($data['error']['message'])) {
            throw InvalidFieldTypeException::fromTypeOfField('error.message', 'string', $data['error']['message']);
        }

        // @phpstan-ignore-next-line : PHPStan cannot infer an "error.data" parameter.
        return $this->responses->createFailure(
            id: $this->tryDecodeId($data),
            code: $data['error']['code'] ?? 0,
            message: $data['error']['message'] ?? '',
            data: $data['error']['data'] ?? null,
        );
    }

    /**
     * @template TIdentifier of mixed
     * @template TResult of mixed
     *
     * @param array{
     *  id: TIdentifier,
     *  result?: TResult
     * } $data
     *
     * @return SuccessfulResponseInterface<TIdentifier, TResult|null>
     * @throws DecodingException
     */
    private function tryDecodeSuccessResponse(array $data): SuccessfulResponseInterface
    {
        return $this->responses->createSuccess(
            id: $this->tryDecodeId($data['id']),
            result: $data['result'] ?? null,
        );
    }
}
