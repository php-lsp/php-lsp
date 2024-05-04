<?php

namespace Lsp\Protocol\Type;

/**
 * Capabilities relating to events from file operations by the user in the client.
 *
 * These events do not come from the file system, they come from user operations
 * like renaming a file in the UI.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.16.0
 */
final class FileOperationClientCapabilities
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.16.0
     */
    final public function __construct(
        public readonly bool $dynamicRegistration,
        public readonly bool $didCreate,
        public readonly bool $willCreate,
        public readonly bool $didRename,
        public readonly bool $willRename,
        public readonly bool $didDelete,
        public readonly bool $willDelete,
    ) {}
}
