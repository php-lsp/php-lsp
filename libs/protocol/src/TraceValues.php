<?php

namespace Lsp\Protocol;

enum TraceValues: string
{
    /**
     * Turn tracing off.
     */
    case Off = 'off';

    /**
     * Trace messages only.
     */
    case Messages = 'messages';

    /**
     * Verbose message tracing.
     */
    case Verbose = 'verbose';
}
