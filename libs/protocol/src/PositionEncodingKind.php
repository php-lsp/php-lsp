<?php

namespace Lsp\Protocol;

/**
 * A set of predefined position encoding kinds.
 *
 * @since 3.17.0
 */
enum PositionEncodingKind: string
{
    /**
     * Character offsets count UTF-8 code units (e.g. bytes).
     */
    case UTF8 = 'utf-8';

    /**
     * Character offsets count UTF-16 code units.
     * 
     * This is the default and must always be supported
     * by servers
     */
    case UTF16 = 'utf-16';

    /**
     * Character offsets count UTF-32 code units.
     * 
     * Implementation note: these are the same as Unicode codepoints,
     * so this `PositionEncodingKind` may also be used for an
     * encoding-agnostic representation of character offsets.
     */
    case UTF32 = 'utf-32';
}