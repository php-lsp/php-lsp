<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Signature help represents the signature of something callable. There can be
 * multiple signature but only one active and only one active parameter.
 *
 * @generated 2024-11-14
 */
final class SignatureHelp
{
    public function __construct(
        /**
         * One or more signatures.
         *
         * @var list<SignatureInformation>
         */
        public readonly array $signatures = [],
        /**
         * The active signature. If omitted or the value lies outside the range
         * of `signatures` the value defaults to zero or is ignored if the
         * `SignatureHelp` has no signatures.
         *
         * Whenever possible implementors should make an active decision about
         * the active signature and shouldn't rely on a default value.
         *
         * In future version of the protocol this property might become
         * mandatory to better express this.
         *
         * @var int<0, 2147483647>|null
         */
        public readonly ?int $activeSignature = null,
        /**
         * The active parameter of the active signature.
         *
         * If `null`, no parameter of the signature is active (for example a
         * named argument that does not match any declared parameters). This is
         * only valid if the client specifies the client capability
         * `textDocument.signatureHelp.noActiveParameterSupport === true`
         *
         * If omitted or the value lies outside the range of
         * `signatures[activeSignature].parameters` defaults to 0 if the active
         * signature has parameters.
         *
         * If the active signature has no parameters it is ignored.
         *
         * In future version of the protocol this property might become
         * mandatory (but still nullable) to better express the active parameter
         * if the active signature does have any.
         *
         * @var int<0, 2147483647>|null
         */
        public readonly ?int $activeParameter = null,
    ) {}
}
