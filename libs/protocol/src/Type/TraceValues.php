<?php

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-05-04T17:58:12+00:00
 */
enum TraceValues: string
{
    /**
     * Turn tracing off.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Off = 'off';

    /**
     * Trace messages only.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Messages = 'messages';

    /**
     * Verbose message tracing.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Verbose = 'verbose';
}
