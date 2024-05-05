<?php

namespace Lsp\Protocol\Type;

/**
 * Client workspace capabilities specific to inline values.
 *
 * @generated
 * @since 3.17.0
 */
final class InlineValueWorkspaceClientCapabilities
{
    final public function __construct(
        public readonly bool $refreshSupport,
    ) {}
}