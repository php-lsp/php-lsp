<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Provider options for a {@link DocumentRangeFormattingRequest}.
 *
 * @generated 2024-09-21
 */
final class DocumentRangeFormattingOptions
{
    use DocumentRangeFormattingOptionsMixin;

    /**
     * @param bool|null $rangesSupport whether the server supports formatting
     *        multiple ranges at once
     */
    public function __construct(?bool $rangesSupport = null, ?bool $workDoneProgress = null)
    {
        $this->rangesSupport = $rangesSupport;
        $this->workDoneProgress = $workDoneProgress;
    }
}
