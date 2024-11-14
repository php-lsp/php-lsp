<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Client capabilities specific to diagnostic pull requests.
 *
 * @since 3.17.0
 *
 * @generated 2024-11-14
 */
final class DiagnosticClientCapabilities
{
    public function __construct(
        /**
         * Whether implementation supports dynamic registration. If this is set
         * to `true` the client supports the new
         * `(TextDocumentRegistrationOptions & StaticRegistrationOptions)`
         * return value for the corresponding server capability as well.
         */
        public readonly ?bool $dynamicRegistration = null,
        /**
         * Whether the clients supports related documents for document
         * diagnostic pulls.
         */
        public readonly ?bool $relatedDocumentSupport = null,
        /**
         * Whether the client supports `MarkupContent` in diagnostic messages.
         *
         * @since 3.18.0
         *
         * @internal This is a proposed type, which means that the
         *           implementation of this type is not final. Please use this type at
         *           your own risk.
         */
        public readonly ?bool $markupMessageSupport = null,
    ) {}
}
