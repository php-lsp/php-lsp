<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Additional details for a completion item label.
 *
 * @since 3.17.0
 *
 * @generated 2024-11-14
 */
final class CompletionItemLabelDetails
{
    public function __construct(
        /**
         * An optional string which is rendered less prominently directly after
         * {@see CompletionItem::$label label},
         * without any spacing. Should be used for function signatures and type
         * annotations.
         */
        public readonly ?string $detail = null,
        /**
         * An optional string which is rendered less prominently after {@see
         * CompletionItem::$detail}. Should be used for fully qualified names
         * and file paths.
         */
        public readonly ?string $description = null,
    ) {}
}
