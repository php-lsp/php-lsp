<?php

namespace Lsp\Protocol\Type;

/**
 * A pattern kind describing if a glob pattern matches a file a folder or
 * both.
 *
 * @generated
 * @since 3.16.0
 */
enum FileOperationPatternKind: string
{
    /**
     * The pattern matches a file only.
     *
     * @generated
     */
    case File = 'file';

    /**
     * The pattern matches a folder only.
     *
     * @generated
     */
    case Folder = 'folder';
}
