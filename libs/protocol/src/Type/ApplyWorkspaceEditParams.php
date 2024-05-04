<?php

namespace Lsp\Protocol\Type;

/**
 * The parameters passed via an apply workspace edit request.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class ApplyWorkspaceEditParams
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(
        public readonly string $label,
        public readonly WorkspaceEdit $edit,
    ) {}
}
