<?php

namespace Lsp\Protocol\Type;

/**
 * The parameters of a notification message.
 *
 * @generated
 */
final class ShowMessageParams
{
    /**
     * @generated
     */
    final public function __construct(
        public readonly MessageType $type,
        public readonly string $message,
    ) {}
}
