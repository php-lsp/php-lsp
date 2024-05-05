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
     * @param list<string> $moreTriggerCharacter
     */
    final public function __construct(array|null $documentSelector, string $firstTriggerCharacter, array $moreTriggerCharacter)
    {
            $this->documentSelector = $documentSelector;
    
            $this->firstTriggerCharacter = $firstTriggerCharacter;
    
            $this->moreTriggerCharacter = $moreTriggerCharacter;
    }
}