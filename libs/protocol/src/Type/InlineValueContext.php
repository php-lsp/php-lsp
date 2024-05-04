<?php

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.17.0
 */
final class InlineValueContext
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.17.0
     * @param int<-2147483648, 2147483647> $frameId
     */
    final public function __construct(
        public readonly int $frameId,
        public readonly Range $stoppedLocation,
    ) {}
}
