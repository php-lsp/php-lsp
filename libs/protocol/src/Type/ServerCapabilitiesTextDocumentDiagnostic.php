<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-11-14
 */
final class ServerCapabilitiesTextDocumentDiagnostic
{
    public function __construct(
        /**
         * Whether the server supports `MarkupContent` in diagnostic messages.
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
