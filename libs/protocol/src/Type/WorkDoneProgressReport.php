<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
final class WorkDoneProgressReport
{
    /**
     * @param int<0, 2147483647> $percentage
     */
    final public function __construct(
        public readonly string $kind,
        public readonly bool $cancellable,
        public readonly string $message,
        public readonly int $percentage,
    ) {}
}