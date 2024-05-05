<?php

namespace Lsp\Protocol\Type;

/**
 * Additional information that describes document changes.
 *
 * @generated
 * @since 3.16.0
 */
final class ChangeAnnotation
{
    final public function __construct(
        public readonly string $label,
        public readonly bool $needsConfirmation,
        public readonly string $description,
    ) {}
}
