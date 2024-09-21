<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-09-21
 */
final class ProgressParams
{
    public function __construct(
        /**
         * The progress token provided by the client or server.
         *
         * @var int<-2147483648, 2147483647>|string
         */
        public readonly int|string $token,
        /**
         * The progress data.
         */
        public readonly mixed $value = null,
    ) {}
}
