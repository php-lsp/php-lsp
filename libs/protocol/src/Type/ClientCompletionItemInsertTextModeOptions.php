<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @since 3.18.0
 */
final class ClientCompletionItemInsertTextModeOptions
{
    public function __construct(
        /**
         * @var list<InsertTextMode>
         */
        public readonly array $valueSet = [],
    ) {}
}
