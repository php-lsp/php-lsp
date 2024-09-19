<?php

namespace Lsp\Protocol\Type;

/**
 * Capabilities relating to events from file operations by the user in the client.
 *
 * These events do not come from the file system, they come from user operations
 * like renaming a file in the UI.
 *
 * @generated
 * @since 3.16.0
 */
final class FileOperationClientCapabilities
{
    final public function __construct(
        public readonly bool|null $dynamicRegistration = null,
        public readonly bool|null $didCreate = null,
        public readonly bool|null $willCreate = null,
        public readonly bool|null $didRename = null,
        public readonly bool|null $willRename = null,
        public readonly bool|null $didDelete = null,
        public readonly bool|null $willDelete = null,
    ) {}
}