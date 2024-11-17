<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

final class LinkedEditingRangeOptions
{
    public function __construct(
        public readonly ?bool $workDoneProgress = null,
    ) {}
}
