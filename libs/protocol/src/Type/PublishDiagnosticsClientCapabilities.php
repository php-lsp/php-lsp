<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The publish diagnostic client capabilities.
 *
 * @generated 2024-11-14
 */
final class PublishDiagnosticsClientCapabilities
{
    public function __construct(
        /**
         * Whether the clients accepts diagnostics with related information.
         */
        public readonly ?bool $relatedInformation = null,
        /**
         * Client supports the tag property to provide meta data about a
         * diagnostic.
         * Clients supporting tags have to handle unknown tags gracefully.
         *
         * @since 3.15.0
         */
        public readonly ?PublishDiagnosticsClientCapabilitiesTagSupport $tagSupport = null,
        /**
         * Whether the client interprets the version property of the
         * `textDocument/publishDiagnostics` notification's parameter.
         *
         * @since 3.15.0
         */
        public readonly ?bool $versionSupport = null,
        /**
         * Client supports a codeDescription property.
         *
         * @since 3.16.0
         */
        public readonly ?bool $codeDescriptionSupport = null,
        /**
         * Whether code action supports the `data` property which is preserved
         * between a `textDocument/publishDiagnostics` and
         * `textDocument/codeAction` request.
         *
         * @since 3.16.0
         */
        public readonly ?bool $dataSupport = null,
    ) {}
}
