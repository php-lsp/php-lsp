<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The log message parameters.
 *
 * @generated 2024-11-15
 */
final class LogMessageParams
{
    public function __construct(
        /**
         * The message type. See {@link MessageType}.
         */
        public readonly MessageType $type,
        /**
         * The actual message.
         */
        public readonly string $message,
    ) {}
}
