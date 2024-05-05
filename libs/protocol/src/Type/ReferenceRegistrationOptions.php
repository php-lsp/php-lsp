<?php

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link ReferencesRequest}.
 *
 * @generated
 */
final class ReferenceRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;

    use ReferenceOptionsMixin;

    /**
     * @generated
     */
    final public function __construct(array|null $documentSelector, bool $workDoneProgress)
    {
        $this->documentSelector = $documentSelector;

        $this->workDoneProgress = $workDoneProgress;
    }
}
