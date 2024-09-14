<?php

namespace Lsp\Protocol\Type;

/**
 * Client workspace capabilities specific to folding ranges
 *
 * @generated
 *
 * @since 3.18.0
 *
 * @internal Describes the upcoming version of the Language Server Protocol and is under development
 */
final class FoldingRangeWorkspaceClientCapabilities
{
    final public function __construct(
        public readonly bool $refreshSupport,
    ) {}
}
