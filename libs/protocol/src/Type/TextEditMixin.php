<?php

namespace Lsp\Protocol\Type;

trait TextEditMixin
{
    /**
     * The range of the text document to be manipulated. To insert
     * text into a document create a range where start === end.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    public readonly Range $range;

    /**
     * The string to be inserted. For delete operations use an
     * empty string.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    public readonly string $newText;
}
