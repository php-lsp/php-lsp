<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-09-21
 */
enum TraceValues: string
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
