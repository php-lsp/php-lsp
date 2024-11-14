<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Provide an inline value through an expression evaluation.
 * If only a range is specified, the expression will be extracted from the
 * underlying document.
 * An optional expression can be used to override the extracted expression.
 *
 * @since 3.17.0
 *
 * @generated 2024-11-14
 */
final class InlineValueEvaluatableExpression
{
    public function __construct(
        /**
         * The document range for which the inline value applies.
         * The range is used to extract the evaluatable expression from the
         * underlying document.
         */
        public readonly Range $range,
        /**
         * If specified the expression overrides the extracted expression.
         */
        public readonly ?string $expression = null,
    ) {}
}
