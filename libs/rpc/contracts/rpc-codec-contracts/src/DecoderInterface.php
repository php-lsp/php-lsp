<?php

declare(strict_types=1);

namespace Lsp\Contracts\Rpc\Codec;

use Lsp\Contracts\Rpc\Codec\Exception\DecodingExceptionInterface;
use Lsp\Contracts\Rpc\Message\MessageInterface;

/**
 * @template T of MessageInterface = MessageInterface
 */
interface DecoderInterface
{
    /**
     * @return T decodable message
     * @throws DecodingExceptionInterface an error occurred while decoding raw
     *         data into the message instance
     */
    public function decode(string $data): MessageInterface;
}
