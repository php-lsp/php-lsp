<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @since 3.18.0
 */
final class NotebookCellLanguage
{
    public function __construct(
        public readonly string $language,
    ) {}
}
