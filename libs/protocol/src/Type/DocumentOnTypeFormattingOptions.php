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
     * @generated
     * @param list<string> $moreTriggerCharacter
     */
    public function __construct(string $firstTriggerCharacter, array $moreTriggerCharacter)
    {
        $this->firstTriggerCharacter = $firstTriggerCharacter;

        $this->moreTriggerCharacter = $moreTriggerCharacter;
    }
}
