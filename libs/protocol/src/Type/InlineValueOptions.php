<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Inline value options used during static registration.
 *
 * @since 3.17.0
 *
 * @generated 2024-11-14
 */
final class InlineValueOptions
{
    use InlineValueOptionsMixin;

    public function __construct(?bool $workDoneProgress = null)
    {
        $this->workDoneProgress = $workDoneProgress;
    }
}
