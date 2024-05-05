<?php

namespace Lsp\Protocol\Type;

/**
 * The workspace folder change event.
 *
 * @generated
 */
final class WorkspaceFoldersChangeEvent
{
    /**
     * @param list<WorkspaceFolder> $added
     * @param list<WorkspaceFolder> $removed
     */
    final public function __construct(
        public readonly array $added,
        public readonly array $removed,
    ) {}
}
