<?php

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link CodeLensRequest}.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class CodeLensRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;

    use CodeLensOptionsMixin;

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
