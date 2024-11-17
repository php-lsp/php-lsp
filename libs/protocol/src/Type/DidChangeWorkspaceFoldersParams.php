<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The parameters of a `workspace/didChangeWorkspaceFolders` notification.
 */
final class DidChangeWorkspaceFoldersParams
{
    public function __construct(
        /**
         * The actual workspace folder change event.
         */
        public readonly WorkspaceFoldersChangeEvent $event,
    ) {}
}
