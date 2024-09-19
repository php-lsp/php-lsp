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
    final public function __construct(
        public readonly string|null $detail = null,
        public readonly string|null $description = null,
    ) {}
}