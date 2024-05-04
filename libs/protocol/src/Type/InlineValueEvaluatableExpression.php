<?php

namespace Lsp\Protocol\Type;

/**
 * Provide an inline value through an expression evaluation.
 * If only a range is specified, the expression will be extracted from the underlying document.
 * An optional expression can be used to override the extracted expression.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.17.0
 */
final class InlineValueEvaluatableExpression
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.17.0
     */
    final public function __construct(
        public readonly Range $range,
        public readonly string $expression,
    ) {}
}
