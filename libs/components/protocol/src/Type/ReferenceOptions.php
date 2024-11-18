<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Reference options.
 */
final class ReferenceOptions
{
    public function __construct(
        public readonly ?bool $workDoneProgress = null,
    ) {}
}
