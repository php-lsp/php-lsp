<?php

namespace Lsp\Protocol\Type;

/**
 * The parameters of a notification message.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class ShowMessageParams
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(
        public readonly MessageType $type,
        public readonly string $message,
    ) {}
}
