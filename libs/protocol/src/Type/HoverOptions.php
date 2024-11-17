<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Hover options.
 */
final class HoverOptions
{
    public function __construct(
        public readonly ?bool $workDoneProgress = null,
    ) {}
}
