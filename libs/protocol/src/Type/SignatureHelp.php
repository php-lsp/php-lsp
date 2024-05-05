<?php

namespace Lsp\Protocol\Type;

/**
 * Signature help represents the signature of something
 * callable. There can be multiple signature but only one
 * active and only one active parameter.
 *
 * @generated
 */
final class SignatureHelp
{
    /**
     * @param list<SignatureInformation> $signatures
     * @param int<0, 2147483647> $activeSignature
     * @param int<0, 2147483647> $activeParameter
     */
    final public function __construct(
        public readonly array $signatures,
        public readonly int $activeSignature,
        public readonly int $activeParameter,
    ) {}
}