<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link DocumentSymbolRequest}.
 *
 * @generated 2024-09-21
 */
final class DocumentSymbolRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;
    use DocumentSymbolOptionsMixin;

    /**
     * @param list<object{
     *            language: string,
     *            scheme: string,
     *            pattern: string
     *        }|NotebookCellTextDocumentFilter>|null $documentSelector A document
     *        selector to identify the scope of the registration. If set to null the
     *        document selector provided on the client side will be used.
     * @param string|null $label a human-readable string that is shown when
     *        multiple outlines trees are shown for the same document
     */
    public function __construct(?array $documentSelector = null, ?string $label = null, ?bool $workDoneProgress = null)
    {
        $this->documentSelector = $documentSelector;
        $this->label = $label;
        $this->workDoneProgress = $workDoneProgress;
    }
}
