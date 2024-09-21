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
trait DiagnosticOptionsMixin
{
    use WorkDoneProgressOptionsMixin;
    /**
     * An optional identifier under which the diagnostics are managed by the
     * client.
     *
     * @readonly
     */
    public ?string $identifier = null;
    /**
     * Whether the language has inter file dependencies meaning that editing
     * code in one file can result in a different diagnostic set in another
     * file. Inter file dependencies are common for most programming languages
     * and typically uncommon for linters.
     */
    public readonly bool $interFileDependencies;
    /**
     * The server provides support for workspace diagnostics as well.
     */
    public readonly bool $workspaceDiagnostics;
}
