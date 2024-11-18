<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

final class SetTraceParams
{
    public function __construct(
        public readonly TraceValue $value,
    ) {}
}
