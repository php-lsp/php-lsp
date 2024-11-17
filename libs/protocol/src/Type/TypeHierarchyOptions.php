<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Type hierarchy options used during static registration.
 *
 * @since 3.17.0
 */
final class TypeHierarchyOptions
{
    public function __construct(
        public readonly ?bool $workDoneProgress = null,
    ) {}
}
