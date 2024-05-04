<?php

namespace Lsp\Protocol\Type;

/**
 * A pattern kind describing if a glob pattern matches a file a folder or
 * both.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.16.0
 */
enum FileOperationPatternKind: string
{
    /**
     * The pattern matches a file only.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case File = 'file';

    /**
     * The pattern matches a folder only.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Folder = 'folder';
}
