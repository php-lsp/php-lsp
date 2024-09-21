<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Provider options for a {@link DocumentOnTypeFormattingRequest}.
 *
 * @generated 2024-09-21
 */
trait DocumentOnTypeFormattingOptionsMixin
{
    /**
     * A character on which formatting should be triggered, like `{`.
     */
    public readonly string $firstTriggerCharacter;
    /**
     * More trigger characters.
     *
     * @var list<string>|null
     *
     * @readonly
     */
    public ?array $moreTriggerCharacter = null;
}
