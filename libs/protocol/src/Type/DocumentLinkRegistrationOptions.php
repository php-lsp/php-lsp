<?php

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link DocumentLinkRequest}.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class DocumentLinkRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;

    use DocumentLinkOptionsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(array|null $documentSelector, bool $resolveProvider, bool $workDoneProgress)
    {
        $this->documentSelector = $documentSelector;

        $this->resolveProvider = $resolveProvider;

        $this->workDoneProgress = $workDoneProgress;
    }
}
