<?php

declare(strict_types=1);

namespace Lsp\Contracts\Rpc\Codec;

use Lsp\Contracts\Rpc\Codec\Exception\EncodingExceptionInterface;
use Lsp\Contracts\Rpc\Message\MessageInterface;

/**
 * @template T of MessageInterface = MessageInterface
 */
interface EncoderInterface
{
    /**
     * @param T $message an encodable message object
     *
     * @throws EncodingExceptionInterface an error occurred while encoding
     *         message into the raw data payload
     */
    public function encode(MessageInterface $message): string;
}
