<?php

namespace Lsp\Protocol\Type;

trait DocumentOnTypeFormattingOptionsMixin
{
    /**
     * A character on which formatting should be triggered, like `{`.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    public readonly string $firstTriggerCharacter;

    /**
     * More trigger characters.
     *
     * @generated 2024-05-04T17:58:12+00:00
     * @var list<string>
     */
    public readonly array $moreTriggerCharacter;
}
