<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Call hierarchy options used during static registration.
 *
 * @since 3.16.0
 */
final class CallHierarchyOptions
{
    public function __construct(
        public readonly ?bool $workDoneProgress = null,
    ) {}
}
