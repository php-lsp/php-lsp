<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Server Capabilities for a {@link DefinitionRequest}.
 *
 * @generated 2024-11-15
 */
final class DefinitionOptions
{
    public function __construct(
        public readonly ?bool $workDoneProgress = null,
    ) {}
}
