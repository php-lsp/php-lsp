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
     * @param list<object|NotebookCellTextDocumentFilter>|null $documentSelector
     * @param list<string>|null $moreTriggerCharacter
     */
    final public function __construct(array|null $documentSelector, string $firstTriggerCharacter, array|null $moreTriggerCharacter = null)
    {
            $this->documentSelector = $documentSelector;
    
            $this->firstTriggerCharacter = $firstTriggerCharacter;
    
            $this->moreTriggerCharacter = $moreTriggerCharacter;
    }
}