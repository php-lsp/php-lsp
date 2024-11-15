<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Inline completion options used during static registration.
 *
 * @since 3.18.0
 *
 * @internal This is a proposed type, which means that the implementation of
 *           this type is not final. Please use this type at your own risk.
 *
 * @generated 2024-11-15
 */
final class InlineCompletionOptions
{
    public function __construct(
        public readonly ?bool $workDoneProgress = null,
    ) {}
}
