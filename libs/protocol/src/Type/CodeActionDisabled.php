<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-09-21
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
