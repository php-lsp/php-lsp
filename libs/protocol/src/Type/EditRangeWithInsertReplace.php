<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Edit range variant that includes ranges for insert and replace operations.
 *
 * @since 3.18.0
 *
 * @generated 2024-11-15
 */
final class EditRangeWithInsertReplace
{
    public function __construct(
        public readonly Range $insert,
        public readonly Range $replace,
    ) {}
}
