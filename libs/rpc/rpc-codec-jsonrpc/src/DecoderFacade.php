<?php

declare(strict_types=1);

namespace Lsp\Rpc\Codec;

use Lsp\Contracts\Rpc\Message\Factory\IdFactoryInterface;
use Lsp\Contracts\Rpc\Message\Factory\RequestFactoryInterface;
use Lsp\Contracts\Rpc\Message\Factory\ResponseFactoryInterface;
use Lsp\Contracts\Rpc\Message\MessageInterface;
use Lsp\Rpc\Codec\JsonRPC\Signature;

/**
 * @template-extends Decoder<MessageInterface>
 */
final class DecoderFacade extends Decoder
{
    private readonly RequestDecoder $requests;
    private readonly ResponseDecoder $responses;

    /**
     * @param int<0, max> $jsonDecodingFlags
     * @param int<1, 2147483647> $jsonMaxDepth
     */
    public function __construct(
        RequestFactoryInterface $requests,
        ResponseFactoryInterface $responses,
        IdFactoryInterface $ids,
        int $jsonDecodingFlags = self::DEFAULT_JSON_FLAGS_DECODE,
        int $jsonMaxDepth = self::DEFAULT_JSON_DEPTH,
        Signature $signature = Signature::ALL,
    ) {
        $this->requests = new RequestDecoder(
            requests: $requests,
            ids: $ids,
            jsonDecodingFlags: $jsonDecodingFlags,
            jsonMaxDepth: $jsonMaxDepth,
            signature: $signature,
        );

        $this->responses = new ResponseDecoder(
            responses: $responses,
            ids: $ids,
            jsonDecodingFlags: $jsonDecodingFlags,
            jsonMaxDepth: $jsonMaxDepth,
            signature: $signature,
        );

        parent::__construct(
            ids: $ids,
            jsonDecodingFlags: $jsonDecodingFlags,
            jsonMaxDepth: $jsonMaxDepth,
            signature: $signature,
        );
    }

    /**
     * @api
     */
    public function getRequestDecoder(): RequestDecoder
    {
        return $this->requests;
    }

    /**
     * @api
     */
    public function getResponseDecoder(): ResponseDecoder
    {
        return $this->responses;
    }

    public function toMessage(array $data): MessageInterface
    {
        if (isset($data['method'])) {
            return $this->requests->toMessage($data);
        }

        return $this->responses->toMessage($data);
    }
}
