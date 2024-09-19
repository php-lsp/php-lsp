<?php

namespace Lsp\Protocol\Type;

trait DiagnosticOptionsMixin
{
    use WorkDoneProgressOptionsMixin;

    /**
     * An optional identifier under which the diagnostics are
     * managed by the client.
     *
     * @generated
     */
    public string|null $identifier = null;

    /**
     * Whether the language has inter file dependencies meaning that
     * editing code in one file can result in a different diagnostic
     * set in another file. Inter file dependencies are common for
     * most programming languages and typically uncommon for linters.
     *
     * @generated
     */
    public readonly bool $interFileDependencies;

    /**
     * The server provides support for workspace diagnostics as well.
     *
     * @generated
     */
    public readonly bool $workspaceDiagnostics;
}