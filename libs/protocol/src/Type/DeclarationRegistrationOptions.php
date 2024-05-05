<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
final class DeclarationRegistrationOptions
{
    use StaticRegistrationOptionsMixin;

    use DeclarationOptionsMixin;

    use TextDocumentRegistrationOptionsMixin;

    /**
     * @generated
     */
    final public function __construct(bool $workDoneProgress, array|null $documentSelector, string $id)
    {
        $this->workDoneProgress = $workDoneProgress;

        $this->documentSelector = $documentSelector;

        $this->id = $id;
    }
}
