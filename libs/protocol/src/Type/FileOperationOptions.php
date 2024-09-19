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
        public readonly FileOperationRegistrationOptions|null $didCreate = null,
        public readonly FileOperationRegistrationOptions|null $willCreate = null,
        public readonly FileOperationRegistrationOptions|null $didRename = null,
        public readonly FileOperationRegistrationOptions|null $willRename = null,
        public readonly FileOperationRegistrationOptions|null $didDelete = null,
        public readonly FileOperationRegistrationOptions|null $willDelete = null,
    ) {}
}