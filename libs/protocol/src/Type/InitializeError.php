<?php

namespace Lsp\Protocol\Type;

/**
 * The data type of the ResponseError if the
 * initialize request fails.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class InitializeError
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(
        public readonly bool $retry,
    ) {}
}
