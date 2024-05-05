<?php

namespace Lsp\Protocol\Type;

/**
 * Workspace client capabilities specific to diagnostic pull requests.
 *
 * @generated
 * @since 3.17.0
 */
final class DiagnosticWorkspaceClientCapabilities
{
    final public function __construct(
        public readonly bool $refreshSupport,
    ) {}
}