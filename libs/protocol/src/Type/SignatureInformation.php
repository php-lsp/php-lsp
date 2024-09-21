<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Represents the signature of something callable. A signature can have a label,
 * like a function-name, a doc-comment, and a set of parameters.
 *
 * @generated 2024-09-21
 */
final class SignatureInformation
{
    public function __construct(
        /**
         * The label of this signature. Will be shown in the UI.
         */
        public readonly string $label,
        /**
         * The human-readable doc-comment of this signature. Will be shown in
         * the UI but can be omitted.
         */
        public readonly string|MarkupContent|null $documentation = null,
        /**
         * The parameters of this signature.
         *
         * @var list<ParameterInformation>|null
         */
        public readonly ?array $parameters = null,
        /**
         * The index of the active parameter.
         *
         * If `null`, no parameter of the signature is active (for example a
         * named argument that does not match any declared parameters). This is
         * only valid since 3.18.0 and if the client specifies the client
         * capability `textDocument.signatureHelp.noActiveParameterSupport ===
         * true`
         *
         * If provided (or `null`), this is used in place of
         * `SignatureHelp.activeParameter`.
         *
         * @since 3.16.0
         *
         * @var int<0, 2147483647>|null
         */
        public readonly ?int $activeParameter = null,
    ) {}
}
