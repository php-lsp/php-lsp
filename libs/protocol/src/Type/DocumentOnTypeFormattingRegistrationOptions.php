<?php

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link DocumentOnTypeFormattingRequest}.
 *
 * @generated
 */
final class DocumentOnTypeFormattingRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;

    use DocumentOnTypeFormattingOptionsMixin;

    /**
     * @generated
     */
    final public function __construct(array|null $documentSelector, string $firstTriggerCharacter, array $moreTriggerCharacter)
    {
        $this->documentSelector = $documentSelector;

        $this->firstTriggerCharacter = $firstTriggerCharacter;

        $this->moreTriggerCharacter = $moreTriggerCharacter;
    }
}
