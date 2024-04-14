<?php

declare(strict_types=1);

namespace Lsp\Contracts\Rpc\Protocol;

use Lsp\Contracts\Rpc\Protocol\Exception\EncodingExceptionInterface;
use Lsp\Contracts\Rpc\Message\MessageInterface;

interface EncoderInterface
{
    /**
     * @throws EncodingExceptionInterface An error occurred while encoding
     *         message into the raw data payload.
     */
    public function encode(MessageInterface $message): string;
}
