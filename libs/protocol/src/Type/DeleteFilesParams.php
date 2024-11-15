<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The parameters sent in notifications/requests for user-initiated deletes of
 * files.
 *
 * @since 3.16.0
 *
 * @generated 2024-11-15
 */
final class DeleteFilesParams
{
    public function __construct(
        /**
         * An array of all files/folders deleted in this operation.
         *
         * @var list<FileDelete>
         */
        public readonly array $files = [],
    ) {}
}
