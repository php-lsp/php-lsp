<?php

namespace Lsp\Protocol\Type;

trait TextDocumentRegistrationOptionsMixin
{
    /**
     * A document selector to identify the scope of the registration. If set to null
     * the document selector provided on the client side will be used.
     *
     * @generated
     * @var list<object|NotebookCellTextDocumentFilter>|null
     */
    public readonly array|null $documentSelector;
}