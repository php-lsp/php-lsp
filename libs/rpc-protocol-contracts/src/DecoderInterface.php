<?php

declare(strict_types=1);

namespace Lsp\Contracts\Rpc\Protocol;

use Lsp\Contracts\Rpc\Protocol\Exception\DecodingExceptionInterface;
use Lsp\Contracts\Rpc\Message\MessageInterface;

interface DecoderInterface
{
    /**
     * @throws DecodingExceptionInterface An error occurred while decoding raw
     *         data into the message instance.
     */
    public function decode(string $data): MessageInterface;
}
