<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @since 3.17.0
 *
 * @generated 2024-11-14
 */
final class InlineValueContext
{
    public function __construct(
        /**
         * The stack frame (as a DAP Id) where the execution has stopped.
         *
         * @var int<-2147483648, 2147483647>
         */
        public readonly int $frameId,
        /**
         * The document range where execution has stopped.
         * Typically the end position of the range denotes the line where the
         * inline values are shown.
         */
        public readonly Range $stoppedLocation,
    ) {}
}
