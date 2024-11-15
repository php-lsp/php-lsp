<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Provider options for a {@link DocumentSymbolRequest}.
 *
 * @generated 2024-11-15
 */
final class DocumentSymbolOptions
{
    public function __construct(
        /**
         * A human-readable string that is shown when multiple outlines trees
         * are shown for the same document.
         *
         * @since 3.16.0
         */
        public readonly ?string $label = null,
        public readonly ?bool $workDoneProgress = null,
    ) {}
}
