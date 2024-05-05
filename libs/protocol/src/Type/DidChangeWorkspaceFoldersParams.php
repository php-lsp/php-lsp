<?php

namespace Lsp\Protocol\Type;

/**
 * The parameters of a `workspace/didChangeWorkspaceFolders` notification.
 *
 * @generated
 */
final class DidChangeWorkspaceFoldersParams
{
    final public function __construct(
        public readonly WorkspaceFoldersChangeEvent $event,
    ) {}
}