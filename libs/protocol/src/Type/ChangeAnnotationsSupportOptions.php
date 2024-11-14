<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @since 3.18.0
 *
 * @generated 2024-11-14
 */
final class ChangeAnnotationsSupportOptions
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
