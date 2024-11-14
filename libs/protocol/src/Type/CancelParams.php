<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-11-14
 */
final class CancelParams
{
    public function __construct(
        /**
         * The request id to cancel.
         *
         * @var int<-2147483648, 2147483647>|string
         */
        public readonly int|string $id,
    ) {}
}
