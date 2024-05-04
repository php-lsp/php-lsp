<?php

namespace Lsp\Protocol\Type;

/**
 * Options for notifications/requests for user operations on files.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.16.0
 */
final class FileOperationOptions
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.16.0
     */
    final public function __construct(
        public readonly FileOperationRegistrationOptions $didCreate,
        public readonly FileOperationRegistrationOptions $willCreate,
        public readonly FileOperationRegistrationOptions $didRename,
        public readonly FileOperationRegistrationOptions $willRename,
        public readonly FileOperationRegistrationOptions $didDelete,
        public readonly FileOperationRegistrationOptions $willDelete,
    ) {}
}
