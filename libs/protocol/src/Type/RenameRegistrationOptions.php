<?php

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link RenameRequest}.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class RenameRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;

    use RenameOptionsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(array|null $documentSelector, bool $prepareProvider, bool $workDoneProgress)
    {
        $this->documentSelector = $documentSelector;

        $this->prepareProvider = $prepareProvider;

        $this->workDoneProgress = $workDoneProgress;
    }
}
