<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

final class WorkDoneProgressParams
{
    public function __construct(
        /**
         * An optional token that a server can use to report work done progress.
         *
         * @var int<-2147483648, 2147483647>|string|null
         */
        public readonly int|string|null $workDoneToken = null,
    ) {}
}
