<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-11-14
 */
final class CompletionListItemDefaultsEditRange
{
    public function __construct(
        public readonly Range $insert,
        public readonly Range $replace,
    ) {}
}
