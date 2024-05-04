<?php

namespace Lsp\Protocol\Type;

/**
 * Workspace client capabilities specific to diagnostic pull requests.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.17.0
 */
final class DiagnosticWorkspaceClientCapabilities
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.17.0
     */
    final public function __construct(
        public readonly bool $refreshSupport,
    ) {}
}
