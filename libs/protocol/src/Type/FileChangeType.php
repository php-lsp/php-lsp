<?php

namespace Lsp\Protocol\Type;

/**
 * The file event type
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
enum FileChangeType: int
{
    /**
     * The file got created.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Created = 1;

    /**
     * The file got changed.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Changed = 2;

    /**
     * The file got deleted.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Deleted = 3;
}
