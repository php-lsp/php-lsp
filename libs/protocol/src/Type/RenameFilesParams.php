<?php

namespace Lsp\Protocol\Type;

/**
 * The parameters sent in notifications/requests for user-initiated renames of
 * files.
 *
 * @generated
 * @since 3.16.0
 */
final class RenameFilesParams
{
    /**
     * @param list<FileRename> $files
     */
    final public function __construct(
        public readonly array $files,
    ) {}
}
