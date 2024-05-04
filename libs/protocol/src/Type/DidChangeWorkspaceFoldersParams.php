<?php

namespace Lsp\Protocol\Type;

/**
 * The parameters of a `workspace/didChangeWorkspaceFolders` notification.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class DidChangeWorkspaceFoldersParams
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(
        public readonly WorkspaceFoldersChangeEvent $event,
    ) {}
}
