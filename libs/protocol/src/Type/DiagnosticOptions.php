<?php

namespace Lsp\Protocol\Type;

/**
 * Diagnostic options.
 *
 * @generated
 * @since 3.17.0
 */
class DiagnosticOptions
{
    use DiagnosticOptionsMixin;

    /**
     * @generated
     * @since 3.17.0
     */
    public function __construct(
        string $identifier,
        bool $interFileDependencies,
        bool $workspaceDiagnostics,
        bool $workDoneProgress,
    ) {
        $this->identifier = $identifier;

        $this->interFileDependencies = $interFileDependencies;

        $this->workspaceDiagnostics = $workspaceDiagnostics;

        $this->workDoneProgress = $workDoneProgress;
    }
}
