<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The parameters passed via an apply workspace edit request.
 *
 * @generated 2024-11-15
 */
final class ApplyWorkspaceEditParams
{
    public function __construct(
        /**
         * The edits to apply.
         */
        public readonly WorkspaceEdit $edit,
        /**
         * An optional label of the workspace edit. This label is presented in
         * the user interface for example on an undo stack to undo the workspace
         * edit.
         */
        public readonly ?string $label = null,
        /**
         * Additional data about the edit.
         *
         * @since 3.18.0
         *
         * @internal This is a proposed type, which means that the
         *           implementation of this type is not final. Please use this type at
         *           your own risk.
         */
        public readonly ?WorkspaceEditMetadata $metadata = null,
    ) {}
}
