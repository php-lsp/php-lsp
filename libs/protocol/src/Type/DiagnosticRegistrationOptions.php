<?php

namespace Lsp\Protocol\Type;

/**
 * Diagnostic registration options.
 *
 * @generated
 * @since 3.17.0
 */
final class DiagnosticRegistrationOptions
{
    use StaticRegistrationOptionsMixin;

    use TextDocumentRegistrationOptionsMixin;

    use DiagnosticOptionsMixin;

    /**
     * @param list<object|NotebookCellTextDocumentFilter>|null $documentSelector
     */
    final public function __construct(
        array|null $documentSelector,
        bool $interFileDependencies,
        bool $workspaceDiagnostics,
        string|null $identifier = null,
        bool|null $workDoneProgress = null,
        string|null $id = null,
    ) {
            $this->documentSelector = $documentSelector;
    
            $this->identifier = $identifier;
    
            $this->interFileDependencies = $interFileDependencies;
    
            $this->workspaceDiagnostics = $workspaceDiagnostics;
    
            $this->workDoneProgress = $workDoneProgress;
    
            $this->id = $id;
    }
}