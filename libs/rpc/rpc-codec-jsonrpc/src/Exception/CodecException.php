<?php

declare(strict_types=1);

namespace Lsp\Rpc\Codec\Exception;

use Lsp\Contracts\Rpc\Codec\Exception\CodecExceptionInterface;

class CodecException extends \DomainException implements CodecExceptionInterface
{
    final public function __construct(string $message, int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
