<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
final class WorkDoneProgressReport
{
    /**
     * @param int<0, 2147483647>|null $percentage
     */
    final public function __construct(
        public readonly string $kind,
        public readonly bool|null $cancellable = null,
        public readonly string|null $message = null,
        public readonly int|null $percentage = null,
    ) {}
}