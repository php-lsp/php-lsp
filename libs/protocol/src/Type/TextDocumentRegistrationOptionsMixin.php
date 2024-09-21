<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * General text document registration options.
 *
 * @generated 2024-09-21
 */
trait TextDocumentRegistrationOptionsMixin
{
    /**
     * A document selector to identify the scope of the registration. If set to
     * null the document selector provided on the client side will be used.
     *
     * @var list<TextDocumentRegistrationOptionsDocumentSelector|NotebookCellTextDocumentFilter>|null
     *
     * @readonly
     */
    public ?array $documentSelector = null;
}
