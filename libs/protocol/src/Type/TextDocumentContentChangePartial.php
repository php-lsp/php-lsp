<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @since 3.18.0
 *
 * @generated 2024-11-14
 */
final class TextDocumentContentChangePartial
{
    public function __construct(
        /**
         * The range of the document that changed.
         */
        public readonly Range $range,
        /**
         * The new text for the provided range.
         */
        public readonly string $text,
        /**
         * The optional length of the range that got replaced.
         *
         * @deprecated use range instead
         *
         * @var int<0, 2147483647>|null
         */
        public readonly ?int $rangeLength = null,
    ) {}
}
