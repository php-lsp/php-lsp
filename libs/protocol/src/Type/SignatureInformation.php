<?php

namespace Lsp\Protocol\Type;

/**
 * Represents the signature of something callable. A signature
 * can have a label, like a function-name, a doc-comment, and
 * a set of parameters.
 *
 * @generated
 */
final class SignatureInformation
{
    /**
     * @param list<ParameterInformation>|null $parameters
     * @param int<0, 2147483647>|null $activeParameter
     */
    final public function __construct(
        public readonly string $label,
        public readonly string|MarkupContent|null $documentation = null,
        public readonly array|null $parameters = null,
        public readonly int|null $activeParameter = null,
    ) {}
}