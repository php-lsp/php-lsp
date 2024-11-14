<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Captures why the code action is currently disabled.
 *
 * @since 3.18.0
 *
 * @generated 2024-11-14
 */
final class CodeActionDisabled
{
    public function __construct(
        /**
         * Human readable description of why the code action is currently
         * disabled.
         *
         * This is displayed in the code actions UI.
         */
        public readonly string $reason,
    ) {}
}
