<?php

declare(strict_types=1);

namespace Lsp\Rpc\Codec;

use Lsp\Contracts\Rpc\Codec\EncoderInterface;
use Lsp\Contracts\Rpc\Message\MessageInterface;
use Lsp\Rpc\Codec\Exception\EncodingException;
use Lsp\Rpc\Codec\JsonRPC\Signature;

/**
 * @template T of MessageInterface
 * @template-implements EncoderInterface<T>
 */
abstract class Encoder extends Codec implements EncoderInterface
{
    /**
     * - JSON_UNESCAPED_UNICODE: This flag allows UTF chars instead "\x0000"
     *   sequences which greatly reduces the amount of transmitted information
     *   in case unicode sequences are transmitted.
     *
     * @var int<0, max>
     */
    public const DEFAULT_JSON_FLAGS_ENCODE = \JSON_UNESCAPED_UNICODE;

    /**
     * @var int<0, max>
     */
    private readonly int $jsonEncodingFlags;

    /**
     * @param int<0, max> $jsonEncodingFlags
     * @param int<1, 2147483647> $jsonMaxDepth
     */
    public function __construct(
        int $jsonEncodingFlags = self::DEFAULT_JSON_FLAGS_ENCODE,
        int $jsonMaxDepth = self::DEFAULT_JSON_DEPTH,
        Signature $signature = Signature::ALL,
    ) {
        // @phpstan-ignore-next-line
        $this->jsonEncodingFlags = $jsonEncodingFlags | \JSON_THROW_ON_ERROR;

        parent::__construct($jsonMaxDepth, $signature);
    }

    /**
     * @param T $message
     *
     * @return array<non-empty-string, mixed>
     */
    abstract protected function toArray(MessageInterface $message): array;

    public function encode(MessageInterface $message): string
    {
        $data = $this->toArray($message);

        if ($this->signature->shouldInsert()) {
            $data['jsonrpc'] = self::DEFAULT_VERSION_VALUE;
        }

        return $this->toJson($data);
    }

    /**
     * Converts variant payload into json string.
     *
     * @param array<non-empty-string, mixed> $data
     *
     * @throws EncodingException
     */
    private function toJson(array $data): string
    {
        try {
            return (string) \json_encode($data, $this->jsonEncodingFlags, $this->jsonMaxDepth);
        } catch (\Throwable $e) {
            throw EncodingException::fromInternalEncodingError($e->getMessage(), (int) $e->getCode());
        }
    }
}
