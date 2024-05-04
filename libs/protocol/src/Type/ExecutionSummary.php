<?php

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-05-04T17:58:12+00:00
 */
final class ExecutionSummary
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @param int<0, 2147483647> $executionOrder
     */
    final public function __construct(
        public readonly int $executionOrder,
        public readonly bool $success,
    ) {}
}
