<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Code Lens provider options of a {@link CodeLensRequest}.
 *
 * @generated 2024-09-21
 */
final class CodeLensOptions
{
    use CodeLensOptionsMixin;

    /**
     * @param bool|null $resolveProvider code lens has a resolve provider as
     *        well
     */
    public function __construct(?bool $resolveProvider = null, ?bool $workDoneProgress = null)
    {
        $this->resolveProvider = $resolveProvider;
        $this->workDoneProgress = $workDoneProgress;
    }
}
