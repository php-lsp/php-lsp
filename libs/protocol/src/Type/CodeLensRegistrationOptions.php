<?php

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link CodeLensRequest}.
 *
 * @generated
 */
final class CodeLensRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;

    use CodeLensOptionsMixin;

    /**
     * @generated
     */
    final public function __construct(array|null $documentSelector, bool $resolveProvider, bool $workDoneProgress)
    {
        $this->documentSelector = $documentSelector;

        $this->resolveProvider = $resolveProvider;

        $this->workDoneProgress = $workDoneProgress;
    }
}
