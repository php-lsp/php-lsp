<?php

namespace Lsp\Protocol\Type;

/**
 * Client workspace capabilities specific to inlay hints.
 *
 * @generated
 * @since 3.17.0
 */
final class InlayHintWorkspaceClientCapabilities
{
    final public function __construct(
        public readonly bool|null $refreshSupport = null,
    ) {}
}