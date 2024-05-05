<?php

namespace Lsp\Protocol\Type;

/**
 * Represents a parameter of a callable-signature. A parameter can
 * have a label and a doc-comment.
 *
 * @generated
 */
final class ParameterInformation
{
    /**
     * @param string|array{
       int<0, 2147483647>,
       int<0, 2147483647>
    } $label
    */
    final public function __construct(
        public readonly string|array $label,
        public readonly string|MarkupContent $documentation,
    ) {}
}
