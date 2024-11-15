<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Diagnostic registration options.
 *
 * @since 3.17.0
 *
 * @generated 2024-11-15
 */
final class DiagnosticRegistrationOptions
{
    public function __construct(
        /**
         * Whether the language has inter file dependencies meaning that editing
         * code in one file can result in a different diagnostic set in another
         * file. Inter file dependencies are common for most programming
         * languages and typically uncommon for linters.
         */
        public readonly bool $interFileDependencies,
        /**
         * The server provides support for workspace diagnostics as well.
         */
        public readonly bool $workspaceDiagnostics,
        /**
         * A document selector to identify the scope of the registration. If set
         * to null the document selector provided on the client side will be
         * used.
         *
         * @var list<(TextDocumentFilterLanguage|TextDocumentFilterScheme|TextDocumentFilterPattern|NotebookCellTextDocumentFilter)>|null
         */
        public readonly ?array $documentSelector = null,
        /**
         * An optional identifier under which the diagnostics are managed by the
         * client.
         */
        public readonly ?string $identifier = null,
        public readonly ?bool $workDoneProgress = null,
        /**
         * The id used to register the request. The id can be used to deregister
         * the request again. See also Registration#id.
         */
        public readonly ?string $id = null,
    ) {}
}
