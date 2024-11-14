<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Diagnostic registration options.
 *
 * @since 3.17.0
 *
 * @generated 2024-11-14
 */
final class DiagnosticRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;
    use DiagnosticOptionsMixin;
    use StaticRegistrationOptionsMixin;

    /**
     * @param list<(TextDocumentFilterLanguage|TextDocumentFilterScheme|TextDocumentFilterPattern|NotebookCellTextDocumentFilter)>|null $documentSelector
     *        A document selector to identify the scope of the registration. If set to
     *        null the document selector provided on the client side will be used.
     * @param string|null $identifier an optional identifier under which the
     *        diagnostics are managed by the client
     * @param bool $interFileDependencies Whether the language has inter file
     *        dependencies meaning that editing code in one file can result in a
     *        different diagnostic set in another file. Inter file dependencies are
     *        common for most programming languages and typically uncommon for linters.
     * @param bool $workspaceDiagnostics the server provides support for
     *        workspace diagnostics as well
     * @param string|null $id The id used to register the request. The id can be
     *        used to deregister the request again. See also Registration#id.
     */
    public function __construct(
        bool $interFileDependencies,
        bool $workspaceDiagnostics,
        ?array $documentSelector = null,
        ?string $identifier = null,
        ?bool $workDoneProgress = null,
        ?string $id = null,
    ) {
        $this->documentSelector = $documentSelector;
        $this->identifier = $identifier;
        $this->interFileDependencies = $interFileDependencies;
        $this->workspaceDiagnostics = $workspaceDiagnostics;
        $this->workDoneProgress = $workDoneProgress;
        $this->id = $id;
    }
}
