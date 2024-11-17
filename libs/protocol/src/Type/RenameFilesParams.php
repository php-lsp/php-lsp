<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The parameters sent in notifications/requests for user-initiated renames of
 * files.
 *
 * @since 3.16.0
 */
final class RenameFilesParams
{
    public function __construct(
        /**
         * An array of all files/folders renamed in this operation. When a
         * folder is renamed, only the folder will be included, and not its
         * children.
         *
         * @var list<FileRename>
         */
        public readonly array $files = [],
    ) {}
}
