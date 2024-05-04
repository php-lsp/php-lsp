<?php

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link DocumentOnTypeFormattingRequest}.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class DocumentOnTypeFormattingRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;

    use DocumentOnTypeFormattingOptionsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(array|null $documentSelector, string $firstTriggerCharacter, array $moreTriggerCharacter)
    {
        $this->documentSelector = $documentSelector;

        $this->firstTriggerCharacter = $firstTriggerCharacter;

        $this->moreTriggerCharacter = $moreTriggerCharacter;
    }
}
