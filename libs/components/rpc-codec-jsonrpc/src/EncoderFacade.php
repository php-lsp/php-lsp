<?php

declare(strict_types=1);

namespace Lsp\Rpc\Codec;

use Lsp\Contracts\Rpc\Message\MessageInterface;
use Lsp\Contracts\Rpc\Message\NotificationInterface;
use Lsp\Contracts\Rpc\Message\ResponseInterface;
use Lsp\Rpc\Codec\JsonRPC\Signature;

/**
 * @template-extends Encoder<MessageInterface>
 */
final class EncoderFacade extends Encoder
{
    private readonly RequestEncoder $requests;
    private readonly ResponseEncoder $responses;

    /**
     * @param int<0, max> $jsonEncodingFlags
     * @param int<1, 2147483647> $jsonMaxDepth
     */
    public function __construct(
        int $jsonEncodingFlags = self::DEFAULT_JSON_FLAGS_ENCODE,
        int $jsonMaxDepth = self::DEFAULT_JSON_DEPTH,
        Signature $signature = Signature::ALL,
    ) {
        $this->requests = new RequestEncoder(
            jsonEncodingFlags: $jsonEncodingFlags,
            jsonMaxDepth: $jsonMaxDepth,
            signature: $signature,
        );

        $this->responses = new ResponseEncoder(
            jsonEncodingFlags: $jsonEncodingFlags,
            jsonMaxDepth: $jsonMaxDepth,
            signature: $signature,
        );

        parent::__construct(
            jsonEncodingFlags: $jsonEncodingFlags,
            jsonMaxDepth: $jsonMaxDepth,
            signature: $signature,
        );
    }

    /**
     * @api
     */
    public function getRequestEncoder(): RequestEncoder
    {
        return $this->requests;
    }

    /**
     * @api
     */
    public function getResponseEncoder(): ResponseEncoder
    {
        return $this->responses;
    }

    public function toArray(MessageInterface $message): array
    {
        return match (true) {
            $message instanceof ResponseInterface
                => $this->responses->toArray($message),
            $message instanceof NotificationInterface
                => $this->requests->toArray($message),
            default => throw new \InvalidArgumentException(
                \sprintf('Unsupported type: %s', $message::class),
            ),
        };
    }
}
