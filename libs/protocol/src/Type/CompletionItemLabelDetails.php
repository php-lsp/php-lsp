<?php

namespace Lsp\Protocol\Type;

/**
 * Additional details for a completion item label.
 *
 * @generated
 * @since 3.17.0
 */
final class CompletionItemLabelDetails
{
    /**
     * @generated
     * @since 3.17.0
     */
    final public function __construct(
        public readonly string $detail,
        public readonly string $description,
    ) {}
}
