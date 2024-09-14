<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 *
 * @since 3.17.0
 */
final class InlineValueContext
{
    /**
     * @param int<-2147483648, 2147483647> $frameId
     */
    final public function __construct(
        public readonly int $frameId,
        public readonly Range $stoppedLocation,
    ) {}
}
