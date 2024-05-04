<?php

namespace Lsp\Protocol\Type;

/**
 * Represents the signature of something callable. A signature
 * can have a label, like a function-name, a doc-comment, and
 * a set of parameters.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class SignatureInformation
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
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
