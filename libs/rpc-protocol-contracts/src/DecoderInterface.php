<?php

declare(strict_types=1);

namespace Lsp\Contracts\Rpc\Protocol;

use Lsp\Contracts\Rpc\Message\MessageInterface;
use Lsp\Contracts\Rpc\Protocol\Exception\DecodingExceptionInterface;

interface DecoderInterface
{
    /**
     * @throws DecodingExceptionInterface an error occurred while decoding raw
     *         data into the message instance
     */
    public function decode(string $data): MessageInterface;
}
