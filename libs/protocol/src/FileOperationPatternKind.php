<?php

namespace Lsp\Protocol;

/**
 * A pattern kind describing if a glob pattern matches a file a folder or
 * both.
 *
 * @since 3.16.0
 */
enum FileOperationPatternKind: string
{
    /**
     * The pattern matches a file only.
     */
    case File = 'file';

    /**
     * The pattern matches a folder only.
     */
    case Folder = 'folder';
}
