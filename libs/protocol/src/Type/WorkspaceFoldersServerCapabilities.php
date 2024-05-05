<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
final class WorkspaceFoldersServerCapabilities
{
    final public function __construct(
        public readonly bool $supported,
        public readonly string|bool $changeNotifications,
    ) {}
}
