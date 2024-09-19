<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
final class WorkspaceFoldersServerCapabilities
{
    final public function __construct(
        public readonly bool|null $supported = null,
        public readonly string|bool|null $changeNotifications = null,
    ) {}
}