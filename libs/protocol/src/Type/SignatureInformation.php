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
     * @generated
     * @param list<ParameterInformation> $parameters
     * @param int<0, 2147483647> $activeParameter
     */
    final public function __construct(
        public readonly string $label,
        public readonly string|MarkupContent $documentation,
        public readonly array $parameters,
        public readonly int $activeParameter,
    ) {}
}
