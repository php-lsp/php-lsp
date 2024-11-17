<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Provider options for a {@link DocumentFormattingRequest}.
 */
final class DocumentFormattingOptions
{
    public function __construct(
        public readonly ?bool $workDoneProgress = null,
    ) {}
}
