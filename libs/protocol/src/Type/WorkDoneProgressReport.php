<?php

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-05-04T17:58:12+00:00
 */
final class WorkDoneProgressReport
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @param int<0, 2147483647> $percentage
     */
    final public function __construct(
        public readonly string $kind,
        public readonly bool $cancellable,
        public readonly string $message,
        public readonly int $percentage,
    ) {}
}
