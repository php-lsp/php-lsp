<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Provider options for a {@link DocumentLinkRequest}.
 *
 * @generated 2024-11-15
 */
final class DocumentLinkOptions
{
    public function __construct(
        /**
         * Document links have a resolve provider as well.
         */
        public readonly ?bool $resolveProvider = null,
        public readonly ?bool $workDoneProgress = null,
    ) {}
}
