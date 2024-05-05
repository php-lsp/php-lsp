<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
final class ExecutionSummary
{
    /**
     * @generated
     * @param int<0, 2147483647> $executionOrder
     */
    final public function __construct(
        public readonly int $executionOrder,
        public readonly bool $success,
    ) {}
}
