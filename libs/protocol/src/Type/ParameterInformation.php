<?php

namespace Lsp\Protocol\Type;

/**
 * Represents a parameter of a callable-signature. A parameter can
 * have a label and a doc-comment.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class ParameterInformation
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
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
