<?php

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-05-04T17:58:12+00:00
 */
final class ProgressParams
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @param int<-2147483648, 2147483647>|string $token
     */
    final public function __construct(
        public readonly int|string $token,
        public readonly mixed $value,
    ) {}
}
