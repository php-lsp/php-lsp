<?php

namespace Lsp\Protocol\Type;

/**
 * A workspace folder inside a client.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class WorkspaceFolder
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @param non-empty-string $uri
     */
    final public function __construct(
        public readonly string $uri,
        public readonly string $name,
    ) {}
}
