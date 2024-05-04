<?php

namespace Lsp\Protocol\Type;

/**
 * The workspace folder change event.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class WorkspaceFoldersChangeEvent
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @param list<WorkspaceFolder> $added
     * @param list<WorkspaceFolder> $removed
     */
    final public function __construct(
        public readonly array $added,
        public readonly array $removed,
    ) {}
}
