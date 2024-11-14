<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Options for notifications/requests for user operations on files.
 *
 * @since 3.16.0
 *
 * @generated 2024-11-14
 */
final class FileOperationOptions
{
    public function __construct(
        /**
         * The server is interested in receiving didCreateFiles notifications.
         */
        public readonly ?FileOperationRegistrationOptions $didCreate = null,
        /**
         * The server is interested in receiving willCreateFiles requests.
         */
        public readonly ?FileOperationRegistrationOptions $willCreate = null,
        /**
         * The server is interested in receiving didRenameFiles notifications.
         */
        public readonly ?FileOperationRegistrationOptions $didRename = null,
        /**
         * The server is interested in receiving willRenameFiles requests.
         */
        public readonly ?FileOperationRegistrationOptions $willRename = null,
        /**
         * The server is interested in receiving didDeleteFiles file
         * notifications.
         */
        public readonly ?FileOperationRegistrationOptions $didDelete = null,
        /**
         * The server is interested in receiving willDeleteFiles file requests.
         */
        public readonly ?FileOperationRegistrationOptions $willDelete = null,
    ) {}
}
