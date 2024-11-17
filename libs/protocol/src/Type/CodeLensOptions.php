<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Code Lens provider options of a {@link CodeLensRequest}.
 */
final class CodeLensOptions
{
    public function __construct(
        /**
         * Code lens has a resolve provider as well.
         */
        public readonly ?bool $resolveProvider = null,
        public readonly ?bool $workDoneProgress = null,
    ) {}
}
