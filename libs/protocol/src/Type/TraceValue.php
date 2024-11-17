<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

enum TraceValue: string
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
