<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
enum WatchKind: int
{
    /**
     * Interested in create events.
     *
     * @generated
     */
    case Create = 1;

    /**
     * Interested in change events
     *
     * @generated
     */
    case Change = 2;

    /**
     * Interested in delete events
     *
     * @generated
     */
    case Delete = 4;
}