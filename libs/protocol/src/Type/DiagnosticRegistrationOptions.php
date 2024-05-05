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
        string $identifier,
        bool $interFileDependencies,
        bool $workspaceDiagnostics,
        bool $workDoneProgress,
        string $id,
    ) {
            $this->documentSelector = $documentSelector;
    
            $this->identifier = $identifier;
    
            $this->interFileDependencies = $interFileDependencies;
    
            $this->workspaceDiagnostics = $workspaceDiagnostics;
    
            $this->workDoneProgress = $workDoneProgress;
    
            $this->id = $id;
    }
}