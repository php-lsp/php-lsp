<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Capabilities relating to events from file operations by the user in the
 * client.
 *
 * These events do not come from the file system, they come from user operations
 * like renaming a file in the UI.
 *
 * @since 3.16.0
 *
 * @generated 2024-11-14
 */
final class FileOperationClientCapabilities
{
    public function __construct(
        /**
         * Whether the client supports dynamic registration for file
         * requests/notifications.
         */
        public readonly ?bool $dynamicRegistration = null,
        /**
         * The client has support for sending didCreateFiles notifications.
         */
        public readonly ?bool $didCreate = null,
        /**
         * The client has support for sending willCreateFiles requests.
         */
        public readonly ?bool $willCreate = null,
        /**
         * The client has support for sending didRenameFiles notifications.
         */
        public readonly ?bool $didRename = null,
        /**
         * The client has support for sending willRenameFiles requests.
         */
        public readonly ?bool $willRename = null,
        /**
         * The client has support for sending didDeleteFiles notifications.
         */
        public readonly ?bool $didDelete = null,
        /**
         * The client has support for sending willDeleteFiles requests.
         */
        public readonly ?bool $willDelete = null,
    ) {}
}
