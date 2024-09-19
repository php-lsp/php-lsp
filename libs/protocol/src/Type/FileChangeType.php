<?php

namespace Lsp\Protocol\Type;

/**
 * The file event type
 *
 * @generated
 */
enum FileChangeType: int
{
    /**
     * The file got created.
     *
     * @generated
     */
    case Created = 1;

    /**
     * The file got changed.
     *
     * @generated
     */
    case Changed = 2;

    /**
     * The file got deleted.
     *
     * @generated
     */
    case Deleted = 3;
}