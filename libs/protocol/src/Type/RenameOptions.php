<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Provider options for a {@link RenameRequest}.
 *
 * @generated 2024-11-14
 */
final class RenameOptions
{
    use RenameOptionsMixin;

    /**
     * @param bool|null $prepareProvider renames should be checked and tested
     *        before being executed
     */
    public function __construct(?bool $prepareProvider = null, ?bool $workDoneProgress = null)
    {
        $this->prepareProvider = $prepareProvider;
        $this->workDoneProgress = $workDoneProgress;
    }
}
