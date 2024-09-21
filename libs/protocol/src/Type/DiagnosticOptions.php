<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Diagnostic options.
 *
 * @since 3.17.0
 *
 * @generated 2024-09-21
 */
final class DiagnosticOptions
{
    use DiagnosticOptionsMixin;

    /**
     * @param string|null $identifier an optional identifier under which the
     *        diagnostics are managed by the client
     * @param bool $interFileDependencies Whether the language has inter file
     *        dependencies meaning that editing code in one file can result in a
     *        different diagnostic set in another file. Inter file dependencies are
     *        common for most programming languages and typically uncommon for linters.
     * @param bool $workspaceDiagnostics the server provides support for
     *        workspace diagnostics as well
     */
    public function __construct(
        bool $interFileDependencies,
        bool $workspaceDiagnostics,
        ?string $identifier = null,
        ?bool $workDoneProgress = null,
    ) {
        $this->identifier = $identifier;
        $this->interFileDependencies = $interFileDependencies;
        $this->workspaceDiagnostics = $workspaceDiagnostics;
        $this->workDoneProgress = $workDoneProgress;
    }
}
