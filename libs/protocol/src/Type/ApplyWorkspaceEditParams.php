<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The parameters passed via an apply workspace edit request.
 *
 * @generated 2024-11-14
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
    ) {}
}
