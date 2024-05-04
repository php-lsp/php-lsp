<?php

namespace Lsp\Protocol\Type;

/**
 * Provider options for a {@link DocumentRangeFormattingRequest}.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
class DocumentRangeFormattingOptions
{
    use DocumentRangeFormattingOptionsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    public function __construct(bool $rangesSupport, bool $workDoneProgress)
    {
        $this->rangesSupport = $rangesSupport;

        $this->workDoneProgress = $workDoneProgress;
    }
}
