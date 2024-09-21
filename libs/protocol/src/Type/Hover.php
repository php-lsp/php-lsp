<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The result of a hover request.
 *
 * @generated 2024-09-21
 */
final class Hover
{
    public function __construct(
        /**
         * The hover's content.
         *
         * @var MarkupContent|string|object{
         *          language: string,
         *          value: string
         *      }|list<string|object{
         *          language: string,
         *          value: string
         *      }>
         */
        public readonly MarkupContent|string|object|array $contents = [],
        /**
         * An optional range inside the text document that is used to visualize
         * the hover, e.g. by changing the background color.
         */
        public readonly ?Range $range = null,
    ) {}
}
