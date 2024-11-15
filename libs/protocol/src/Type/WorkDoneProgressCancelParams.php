<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-11-15
 */
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
