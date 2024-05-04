<?php

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-05-04T17:58:12+00:00
 */
enum WatchKind: int
{
    /**
     * Interested in create events.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Create = 1;

    /**
     * Interested in change events
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Change = 2;

    /**
     * Interested in delete events
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Delete = 4;
}
