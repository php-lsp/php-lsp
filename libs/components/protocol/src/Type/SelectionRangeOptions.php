<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

final class SelectionRangeOptions
{
    public function __construct(
        public readonly ?bool $workDoneProgress = null,
    ) {}
}
