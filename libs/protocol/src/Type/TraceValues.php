<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
enum TraceValues: string
{
    /**
     * Turn tracing off.
     *
     * @generated
     */
    case Off = 'off';

    /**
     * Trace messages only.
     *
     * @generated
     */
    case Messages = 'messages';

    /**
     * Verbose message tracing.
     *
     * @generated
     */
    case Verbose = 'verbose';
}
