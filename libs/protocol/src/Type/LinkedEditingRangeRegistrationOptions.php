<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
final class LinkedEditingRangeRegistrationOptions
{
    use StaticRegistrationOptionsMixin;

    use TextDocumentRegistrationOptionsMixin;

    use LinkedEditingRangeOptionsMixin;

    /**
     * @generated
     */
    final public function __construct(array|null $documentSelector, bool $workDoneProgress, string $id)
    {
        $this->documentSelector = $documentSelector;

        $this->workDoneProgress = $workDoneProgress;

        $this->id = $id;
    }
}
