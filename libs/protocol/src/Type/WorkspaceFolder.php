<?php

namespace Lsp\Protocol\Type;

/**
 * A workspace folder inside a client.
 *
 * @generated
 */
final class WorkspaceFolder
{
    /**
     * @param non-empty-string $uri
     */
    final public function __construct(
        public readonly string $uri,
        public readonly string $name,
    ) {}
}
