<?php

namespace Lsp\Protocol\Type;

/**
 * The parameters passed via an apply workspace edit request.
 *
 * @generated
 */
final class ApplyWorkspaceEditParams
{
    final public function __construct(
        public readonly string $label,
        public readonly WorkspaceEdit $edit,
    ) {}
}