<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @since 3.18.0
 */
final class PrepareRenameDefaultBehavior
{
    public function __construct(
        public readonly bool $defaultBehavior,
    ) {}
}
