<?php

namespace Lsp\Protocol\Type;

/**
 * Client workspace capabilities specific to folding ranges
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.18.0
 * @internal Describes the upcoming version of the Language Server Protocol and is under development
 */
final class FoldingRangeWorkspaceClientCapabilities
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.18.0
     * @internal Describes the upcoming version of the Language Server Protocol and is under development
     */
    final public function __construct(
        public readonly bool $refreshSupport,
    ) {}
}
