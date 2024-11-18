<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

final class WorkDoneProgressCancelParams
{
    public function __construct(
        /**
         * The token to be used to report progress.
         *
         * @var int<-2147483648, 2147483647>|string
         */
        public readonly int|string $token,
    ) {}
}
