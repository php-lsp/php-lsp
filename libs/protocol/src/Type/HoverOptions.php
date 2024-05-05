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

    function __construct(bool $workDoneProgress)
    {
            $this->workDoneProgress = $workDoneProgress;
    }
}