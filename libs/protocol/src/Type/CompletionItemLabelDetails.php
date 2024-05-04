<?php

namespace Lsp\Protocol\Type;

/**
 * Additional details for a completion item label.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.17.0
 */
final class CompletionItemLabelDetails
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.17.0
     */
    final public function __construct(
        public readonly string $detail,
        public readonly string $description,
    ) {}
}
