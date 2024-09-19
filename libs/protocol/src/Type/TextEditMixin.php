<?php

namespace Lsp\Protocol\Type;

trait TextEditMixin
{
    /**
     * The range of the text document to be manipulated. To insert
     * text into a document create a range where start === end.
     *
     * @generated
     */
    public readonly Range $range;

    /**
     * The string to be inserted. For delete operations use an
     * empty string.
     *
     * @generated
     */
    public readonly string $newText;
}