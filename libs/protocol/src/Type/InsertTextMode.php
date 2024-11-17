<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * How whitespace and indentation is handled during completion item insertion.
 *
 * @since 3.16.0
 */
enum InsertTextMode: int
{
    /**
     * The insertion or replace strings is taken as it is. If the value is multi
     * line the lines below the cursor will be inserted using the indentation
     * defined in the string value.
     * The client will not apply any kind of adjustments to the string.
     *
     * @var int<0, 2147483647>
     */
    case AsIs = 1;
    /**
     * The editor adjusts leading whitespace of new lines so that they match the
     * indentation up to the cursor of the line for which the item is accepted.
     *
     * Consider a line like this: <2tabs><cursor><3tabs>foo. Accepting a multi
     * line completion item is indented using 2 tabs and all following lines
     * inserted will be indented using 2 tabs as well.
     *
     * @var int<0, 2147483647>
     */
    case AdjustIndentation = 2;
}
