<?php

namespace Lsp\Protocol\Type;

/**
 * The log message parameters.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class LogMessageParams
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(
        public readonly MessageType $type,
        public readonly string $message,
    ) {}
}
