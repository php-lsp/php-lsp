<?php

declare(strict_types=1);

namespace Lsp\Rpc\Protocol\Exception;

use Lsp\Contracts\Rpc\Protocol\Exception\ProtocolExceptionInterface;

class ProtocolException extends \DomainException implements ProtocolExceptionInterface
{
    final public function __construct(string $message, int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
