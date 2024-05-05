<?php

namespace Lsp\Protocol\Type;

/**
 * Options for notifications/requests for user operations on files.
 *
 * @generated
 * @since 3.16.0
 */
final class FileOperationOptions
{
    final public function __construct(
        public readonly FileOperationRegistrationOptions $didCreate,
        public readonly FileOperationRegistrationOptions $willCreate,
        public readonly FileOperationRegistrationOptions $didRename,
        public readonly FileOperationRegistrationOptions $willRename,
        public readonly FileOperationRegistrationOptions $didDelete,
        public readonly FileOperationRegistrationOptions $willDelete,
    ) {}
}
