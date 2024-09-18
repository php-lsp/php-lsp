<?php

declare(strict_types=1);

namespace Lsp\Rpc\Codec;

use Lsp\Contracts\Rpc\Message\Factory\IdFactoryInterface;
use Lsp\Contracts\Rpc\Message\Factory\ResponseFactoryInterface;
use Lsp\Contracts\Rpc\Message\FailureResponseInterface;
use Lsp\Contracts\Rpc\Message\ResponseInterface;
use Lsp\Contracts\Rpc\Message\SuccessfulResponseInterface;
use Lsp\Rpc\Codec\Exception\DecodingException;
use Lsp\Rpc\Codec\Exception\InvalidFieldTypeException;
use Lsp\Rpc\Codec\Exception\RequiredFieldNotDefinedException;
use Lsp\Rpc\Codec\JsonRPC\Signature;

/**
 * @template-extends Decoder<ResponseInterface<mixed>>
 */
final class ResponseDecoder extends Decoder
{
    /**
     * @param int<0, max> $jsonDecodingFlags
     * @param int<1, 2147483647> $jsonMaxDepth
     */
    public function __construct(
        private readonly ResponseFactoryInterface $responses,
        IdFactoryInterface $ids,
        int $jsonDecodingFlags = self::DEFAULT_JSON_FLAGS_DECODE,
        int $jsonMaxDepth = self::DEFAULT_JSON_DEPTH,
        Signature $signature = Signature::ALL,
    ) {
        parent::__construct(
            ids: $ids,
            jsonDecodingFlags: $jsonDecodingFlags,
            jsonMaxDepth: $jsonMaxDepth,
            signature: $signature,
        );
    }

    protected function toMessage(array $data): ResponseInterface
    {
        return $this->tryDecodeResponse($data);
    }

    /**
     * @param array<array-key, mixed> $data
     *
     * @return ResponseInterface<mixed>
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
     * @param array<array-key, mixed> $data
     *
     * @return FailureResponseInterface<mixed, mixed>
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
     * @template TArgIdentifier of mixed
     * @template TArgResult of mixed
     *
     * @param array{
     *  id: TArgIdentifier,
     *  result?: TArgResult
     * } $data
     *
     * @return SuccessfulResponseInterface<TArgIdentifier, TArgResult|null>
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
