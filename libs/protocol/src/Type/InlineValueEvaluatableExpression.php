<?php

namespace Lsp\Protocol\Type;

/**
 * Provide an inline value through an expression evaluation.
 * If only a range is specified, the expression will be extracted from the underlying document.
 * An optional expression can be used to override the extracted expression.
 *
 * @generated
 * @since 3.17.0
 */
final class InlineValueEvaluatableExpression
{
    final public function __construct(
        public readonly Range $range,
        public readonly string|null $expression = null,
    ) {}
}