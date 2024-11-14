<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The parameters of a {@link DocumentOnTypeFormattingRequest}.
 *
 * @generated 2024-11-14
 */
final class DocumentOnTypeFormattingParams
{
    public function __construct(
        /**
         * The document to format.
         */
        public readonly TextDocumentIdentifier $textDocument,
        /**
         * The position around which the on type formatting should happen.
         * This is not necessarily the exact position where the character
         * denoted by the property `ch` got typed.
         */
        public readonly Position $position,
        /**
         * The character that has been typed that triggered the formatting on
         * type request. That is not necessarily the last character that got
         * inserted into the document since the client could auto insert
         * characters as well (e.g. like automatic brace completion).
         */
        public readonly string $ch,
        /**
         * The formatting options.
         */
        public readonly FormattingOptions $options,
    ) {}
}
