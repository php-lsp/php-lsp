<?php

namespace Lsp\Protocol\Type;

/**
 * Reference options.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
class ReferenceOptions
{
    use ReferenceOptionsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    public function __construct(bool $workDoneProgress)
    {
        $this->workDoneProgress = $workDoneProgress;
    }
}
