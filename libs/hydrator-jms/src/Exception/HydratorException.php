<?php

declare(strict_types=1);

namespace Lsp\Hydrator\JMS\Exception;

use Lsp\Contracts\Hydrator\Exception\HydratorExceptionInterface;

class HydratorException extends \LogicException implements HydratorExceptionInterface
{
    final public function __construct(string $message, int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
