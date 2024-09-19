<?php

namespace Lsp\Protocol\Type;

/**
 * Provider options for a {@link DocumentOnTypeFormattingRequest}.
 *
 * @generated
 */
class DocumentOnTypeFormattingOptions
{
    use DocumentOnTypeFormattingOptionsMixin;

    /**
     * @param list<string>|null $moreTriggerCharacter
     */
    public function __construct(string $firstTriggerCharacter, array|null $moreTriggerCharacter)
    {
            $this->firstTriggerCharacter = $firstTriggerCharacter;
    
            $this->moreTriggerCharacter = $moreTriggerCharacter;
    }
}