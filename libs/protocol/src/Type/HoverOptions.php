<?php

namespace Lsp\Protocol\Type;

/**
 * Hover options.
 *
 * @generated
 */
class HoverOptions
{
    use HoverOptionsMixin;

    public function __construct(bool|null $workDoneProgress)
    {
            $this->workDoneProgress = $workDoneProgress;
    }
}