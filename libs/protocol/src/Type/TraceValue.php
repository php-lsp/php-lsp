<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

enum TraceValue: string
{
    /**
     * Turn tracing off.
     *
     * @var string
     */
    case Off = 'off';
    /**
     * Trace messages only.
     *
     * @var string
     */
    case Messages = 'messages';
    /**
     * Verbose message tracing.
     *
     * @var string
     */
    case Verbose = 'verbose';
}
