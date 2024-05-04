<?php

namespace Lsp\Protocol\Type;

/**
 * Provider options for a {@link DocumentOnTypeFormattingRequest}.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
class DocumentOnTypeFormattingOptions
{
    use DocumentOnTypeFormattingOptionsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @param list<string> $moreTriggerCharacter
     */
    public function __construct(string $firstTriggerCharacter, array $moreTriggerCharacter)
    {
        $this->firstTriggerCharacter = $firstTriggerCharacter;

        $this->moreTriggerCharacter = $moreTriggerCharacter;
    }
}
