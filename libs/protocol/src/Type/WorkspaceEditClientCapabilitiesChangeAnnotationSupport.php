<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-09-21
 */
final class WorkspaceEditClientCapabilitiesChangeAnnotationSupport
{
    public function __construct(
        /**
         * Whether the client groups edits with equal labels into tree nodes,
         * for instance all edits labelled with "Changes in Strings" would be a
         * tree node.
         */
        public readonly ?bool $groupsOnLabel = null,
    ) {}
}
