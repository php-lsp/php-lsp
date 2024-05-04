<?php

namespace Lsp\Protocol\Type;

/**
 * Diagnostic registration options.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.17.0
 */
final class DiagnosticRegistrationOptions
{
    use StaticRegistrationOptionsMixin;

    use TextDocumentRegistrationOptionsMixin;

    use DiagnosticOptionsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.17.0
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
