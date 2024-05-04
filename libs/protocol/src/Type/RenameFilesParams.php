<?php

namespace Lsp\Protocol\Type;

/**
 * The parameters sent in notifications/requests for user-initiated renames of
 * files.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.16.0
 */
final class RenameFilesParams
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.16.0
     * @param list<FileRename> $files
     */
    final public function __construct(
        public readonly array $files,
    ) {}
}
