<?php

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link HoverRequest}.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class HoverRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;

    use HoverOptionsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(array|null $documentSelector, bool $workDoneProgress)
    {
        $this->documentSelector = $documentSelector;

        $this->workDoneProgress = $workDoneProgress;
    }
}
