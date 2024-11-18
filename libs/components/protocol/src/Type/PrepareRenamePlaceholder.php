<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @since 3.18.0
 */
final class PrepareRenamePlaceholder
{
    public function __construct(
        public readonly Range $range,
        public readonly string $placeholder,
    ) {}
}
