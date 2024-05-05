<?php

namespace Lsp\Protocol\Type;

/**
 * The data type of the ResponseError if the
 * initialize request fails.
 *
 * @generated
 */
final class InitializeError
{
    final public function __construct(
        public readonly bool $retry,
    ) {}
}
