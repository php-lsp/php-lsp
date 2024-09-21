<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-09-21
 */
final class CompletionListItemDefaults
{
    public function __construct(
        /**
         * A default commit character set.
         *
         * @since 3.17.0
         *
         * @var list<string>|null
         */
        public readonly ?array $commitCharacters = null,
        /**
         * A default edit range.
         *
         * @since 3.17.0
         *
         * @var Range|object{
         *          insert: Range,
         *          replace: Range
         *      }|null
         */
        public readonly Range|object|null $editRange = null,
        /**
         * A default insert text format.
         *
         * @since 3.17.0
         */
        public readonly ?InsertTextFormat $insertTextFormat = null,
        /**
         * A default insert text mode.
         *
         * @since 3.17.0
         */
        public readonly ?InsertTextMode $insertTextMode = null,
        /**
         * A default data value.
         *
         * @since 3.17.0
         */
        public readonly mixed $data = null,
    ) {}
}
