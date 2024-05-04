<?php

namespace Lsp\Protocol\Type;

/**
 * A set of predefined position encoding kinds.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.17.0
 */
enum PositionEncodingKind: string
{
    /**
     * Character offsets count UTF-8 code units (e.g. bytes).
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case UTF8 = 'utf-8';

    /**
     * Character offsets count UTF-16 code units.
     *
     * This is the default and must always be supported
     * by servers
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case UTF16 = 'utf-16';

    /**
     * Character offsets count UTF-32 code units.
     *
     * Implementation note: these are the same as Unicode codepoints,
     * so this `PositionEncodingKind` may also be used for an
     * encoding-agnostic representation of character offsets.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case UTF32 = 'utf-32';
}
