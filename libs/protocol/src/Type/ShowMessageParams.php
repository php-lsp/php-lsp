<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The parameters of a notification message.
 *
 * @generated 2024-11-14
 */
final class ShowMessageParams
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
