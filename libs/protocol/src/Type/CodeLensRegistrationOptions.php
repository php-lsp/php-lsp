<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link CodeLensRequest}.
 *
 * @generated 2024-11-14
 */
final class CodeLensRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;
    use CodeLensOptionsMixin;

    /**
     * @param list<(TextDocumentRegistrationOptionsDocumentSelector|NotebookCellTextDocumentFilter)>|null $documentSelector
     *        A document selector to identify the scope of the registration. If set to
     *        null the document selector provided on the client side will be used.
     * @param bool|null $resolveProvider code lens has a resolve provider as
     *        well
     */
    public function __construct(?array $documentSelector = null, ?bool $resolveProvider = null, ?bool $workDoneProgress = null)
    {
        $this->documentSelector = $documentSelector;
        $this->resolveProvider = $resolveProvider;
        $this->workDoneProgress = $workDoneProgress;
    }
}
