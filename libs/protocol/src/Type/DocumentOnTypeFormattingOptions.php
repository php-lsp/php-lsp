<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Provider options for a {@link DocumentOnTypeFormattingRequest}.
 *
 * @generated 2024-09-21
 */
final class DocumentOnTypeFormattingOptions
{
    use DocumentOnTypeFormattingOptionsMixin;

    /**
     * @param string $firstTriggerCharacter a character on which formatting
     *        should be triggered, like `{`
     * @param list<string>|null $moreTriggerCharacter more trigger characters
     */
    public function __construct(string $firstTriggerCharacter, ?array $moreTriggerCharacter = null)
    {
        $this->firstTriggerCharacter = $firstTriggerCharacter;
        $this->moreTriggerCharacter = $moreTriggerCharacter;
    }
}
