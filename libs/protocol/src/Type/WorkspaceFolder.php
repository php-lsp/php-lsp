<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A workspace folder inside a client.
 *
 * @generated 2024-11-14
 */
final class WorkspaceFolder
{
    public function __construct(
        /**
         * The associated URI for this workspace folder.
         *
         * @var non-empty-string
         */
        public readonly string $uri,
        /**
         * The name of the workspace folder. Used to refer to this workspace
         * folder in the user interface.
         */
        public readonly string $name,
    ) {}
}
