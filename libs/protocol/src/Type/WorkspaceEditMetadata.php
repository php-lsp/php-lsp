<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Additional data about a workspace edit.
 *
 * @since 3.18.0
 *
 * @internal This is a proposed type, which means that the implementation of
 *           this type is not final. Please use this type at your own risk.
 *
 * @generated 2024-11-14
 */
final class WorkspaceEditMetadata
{
    public function __construct(
        /**
         * Signal to the editor that this edit is a refactoring.
         */
        public readonly ?bool $isRefactoring = null,
    ) {}
}
