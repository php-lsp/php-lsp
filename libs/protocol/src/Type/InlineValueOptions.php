<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Inline value options used during static registration.
 *
 * @since 3.17.0
 */
final class InlineValueOptions
{
    public function __construct(
        public readonly ?bool $workDoneProgress = null,
    ) {}
}
