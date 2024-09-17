<?php

declare(strict_types=1);

namespace Lsp\Rpc\Message\Factory\Exception;

class IdException extends \DomainException implements IdExceptionInterface
{
    protected const ERROR_CODE_LAST = 0x00;

    final public function __construct(string $message, int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
