<?php

namespace Lsp\Protocol\Type;

/**
 * Represents information on a file/folder delete.
 *
 * @generated
 *
 * @since 3.16.0
 */
final class FileDelete
{
    final public function __construct(
        public readonly string $uri,
    ) {}
}
