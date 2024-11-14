<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link RenameRequest}.
 *
 * @generated 2024-11-14
 */
final class RenameRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;
    use RenameOptionsMixin;

    /**
     * @param list<(TextDocumentFilterLanguage|TextDocumentFilterScheme|TextDocumentFilterPattern|NotebookCellTextDocumentFilter)>|null $documentSelector
     *        A document selector to identify the scope of the registration. If set to
     *        null the document selector provided on the client side will be used.
     * @param bool|null $prepareProvider renames should be checked and tested
     *        before being executed
     */
    public function __construct(?array $documentSelector = null, ?bool $prepareProvider = null, ?bool $workDoneProgress = null)
    {
        $this->documentSelector = $documentSelector;
        $this->prepareProvider = $prepareProvider;
        $this->workDoneProgress = $workDoneProgress;
    }
}
