<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-11-15
 */
final class ExecutionSummary
{
    public function __construct(
        /**
         * A strict monotonically increasing value indicating the execution
         * order of a cell inside a notebook.
         *
         * @var int<0, 2147483647>
         */
        public readonly int $executionOrder,
        /**
         * Whether the execution was successful or not if known by the client.
         */
        public readonly ?bool $success = null,
    ) {}
}
