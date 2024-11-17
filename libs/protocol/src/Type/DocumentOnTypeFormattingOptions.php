<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Provider options for a {@link DocumentOnTypeFormattingRequest}.
 */
final class DocumentOnTypeFormattingOptions
{
    public function __construct(
        /**
         * A character on which formatting should be triggered, like `{`.
         */
        public readonly string $firstTriggerCharacter,
        /**
         * More trigger characters.
         *
         * @var list<string>|null
         */
        public readonly ?array $moreTriggerCharacter = null,
    ) {}
}
