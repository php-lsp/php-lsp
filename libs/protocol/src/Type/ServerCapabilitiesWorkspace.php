<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-09-21
 */
final class ServerCapabilitiesWorkspace
{
    public function __construct(
        /**
         * The server supports workspace folder.
         *
         * @since 3.6.0
         */
        public readonly ?WorkspaceFoldersServerCapabilities $workspaceFolders = null,
        /**
         * The server is interested in notifications/requests for operations on
         * files.
         *
         * @since 3.16.0
         */
        public readonly ?FileOperationOptions $fileOperations = null,
    ) {}
}
