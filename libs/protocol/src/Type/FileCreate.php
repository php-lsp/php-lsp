<?php

namespace Lsp\Protocol\Type;

/**
 * Represents information on a file/folder create.
 *
 * @generated
 * @since 3.16.0
 */
final class FileCreate
{
    final public function __construct(
        public readonly string $uri,
    ) {}
}