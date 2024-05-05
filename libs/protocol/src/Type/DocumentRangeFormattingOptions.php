<?php

namespace Lsp\Protocol\Type;

/**
 * Provider options for a {@link DocumentRangeFormattingRequest}.
 *
 * @generated
 */
class DocumentRangeFormattingOptions
{
    use DocumentRangeFormattingOptionsMixin;

    public function __construct(bool $rangesSupport, bool $workDoneProgress)
    {
        $this->rangesSupport = $rangesSupport;

        $this->workDoneProgress = $workDoneProgress;
    }
}
