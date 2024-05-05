<?php

namespace Lsp\Protocol\Type;

/**
 * The parameters of a notification message.
 *
 * @generated
 */
final class ShowMessageParams
{
    final public function __construct(
        public readonly MessageType $type,
        public readonly string $message,
    ) {}
}
