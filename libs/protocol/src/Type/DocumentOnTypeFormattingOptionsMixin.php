<?php

namespace Lsp\Protocol\Type;

trait DocumentOnTypeFormattingOptionsMixin
{
    /**
     * A character on which formatting should be triggered, like `{`.
     *
     * @generated
     */
    public readonly string $firstTriggerCharacter;

    /**
     * More trigger characters.
     *
     * @generated
     * @var list<string>|null
     */
    public array|null $moreTriggerCharacter = null;
}