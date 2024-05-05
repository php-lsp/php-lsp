<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 * @internal This class is an internal dependency of {@see ServerCapabilities}
 */
final class ServerCapabilitiesWorkspace
{
    final public function __construct(
        public readonly WorkspaceFoldersServerCapabilities $workspaceFolders,
        public readonly FileOperationOptions $fileOperations,
    ) {}
}
