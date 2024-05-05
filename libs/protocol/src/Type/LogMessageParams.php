<?php

namespace Lsp\Protocol\Type;

/**
 * The log message parameters.
 *
 * @generated
 */
final class LogMessageParams
{
    final public function __construct(
        public readonly MessageType $type,
        public readonly string $message,
    ) {}
}
