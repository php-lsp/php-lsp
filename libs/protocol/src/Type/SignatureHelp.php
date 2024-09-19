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
     * @param int<0, 2147483647>|null $activeSignature
     * @param int<0, 2147483647>|null $activeParameter
     */
    final public function __construct(
        public readonly array $signatures,
        public readonly int|null $activeSignature = null,
        public readonly int|null $activeParameter = null,
    ) {}
}