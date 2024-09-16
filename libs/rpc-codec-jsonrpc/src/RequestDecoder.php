<?php

declare(strict_types=1);

namespace Lsp\Rpc\Codec;

use Lsp\Contracts\Rpc\Message\Factory\IdFactoryInterface;
use Lsp\Contracts\Rpc\Message\Factory\RequestFactoryInterface;
use Lsp\Contracts\Rpc\Message\NotificationInterface;
use Lsp\Rpc\Codec\Exception\DecodingException;
use Lsp\Rpc\Codec\Exception\DependencyRequiredException;
use Lsp\Rpc\Codec\Exception\InvalidFieldTypeException;
use Lsp\Rpc\Codec\Exception\RequiredFieldNotDefinedException;
use Lsp\Rpc\Codec\JsonRPC\Signature;
use Lsp\Rpc\Message\Factory\RequestFactory;

/**
 * @template-extends Decoder<NotificationInterface>
 */
final class RequestDecoder extends Decoder
{
    private readonly RequestFactoryInterface $requests;

    /**
     * @param int<0, max> $jsonDecodingFlags
     * @param int<1, 2147483647> $jsonMaxDepth
     */
    public function __construct(
        ?RequestFactoryInterface $requests = null,
        ?IdFactoryInterface $ids = null,
        int $jsonDecodingFlags = self::DEFAULT_JSON_FLAGS_DECODE,
        int $jsonMaxDepth = self::DEFAULT_JSON_DEPTH,
        Signature $signature = Signature::ALL,
    ) {
        $this->requests = $requests ?? $this->createRequestFactory();

        parent::__construct(
            ids: $ids,
            jsonDecodingFlags: $jsonDecodingFlags,
            jsonMaxDepth: $jsonMaxDepth,
            signature: $signature,
        );
    }

    private function createRequestFactory(): RequestFactoryInterface
    {
        if (\class_exists(RequestFactory::class)) {
            return new RequestFactory();
        }

        throw DependencyRequiredException::fromMissingRequestFactoryImplementation();
    }

    protected function toMessage(array $data): NotificationInterface
    {
        return $this->tryDecodeRequest($data);
    }

    /**
     * @param array<array-key, mixed> $data
     *
     * @return non-empty-string
     */
    private function fetchMethod(array $data): string
    {
        if (!\array_key_exists('method', $data)) {
            throw RequiredFieldNotDefinedException::fromField('method');
        }

        $method = $data['method'];

        // Transform (normalize) the method into a string if this is possible.
        if (\is_scalar($method) || $method instanceof \Stringable) {
            $method = (string) $method;
        }

        if ($method === '') {
            throw InvalidFieldTypeException::fromTypeOfField(
                field: 'method',
                expected: 'non-empty-string',
                given: $method,
            );
        }

        return $method;
    }

    /**
     * @param array<array-key, mixed> $data
     *
     * @return array<array-key, mixed>
     */
    private function fetchParams(array $data): array
    {
        return match (true) {
            !\array_key_exists('params', $data) => [],
            !\is_array($data['params']) => (array) $data['params'],
            default => $data['params'],
        };
    }

    /**
     * @param array<array-key, mixed> $data
     *
     * @throws DecodingException
     */
    private function tryDecodeRequest(array $data): NotificationInterface
    {
        if (\array_key_exists('id', $data)) {
            return $this->requests->createRequest(
                method: $this->fetchMethod($data),
                parameters: $this->fetchParams($data),
                id: $this->tryDecodeId($data['id']),
            );
        }

        return $this->requests->createNotification(
            method: $this->fetchMethod($data),
            parameters: $this->fetchParams($data),
        );
    }
}
