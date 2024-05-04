<?php

namespace Lsp\Protocol\Type;

/**
 * Additional information that describes document changes.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.16.0
 */
final class ChangeAnnotation
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.16.0
     */
    final public function __construct(
        public readonly string $label,
        public readonly bool $needsConfirmation,
        public readonly string $description,
    ) {}
}
