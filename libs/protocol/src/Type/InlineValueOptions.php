<?php

namespace Lsp\Protocol\Type;

/**
 * Inline value options used during static registration.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.17.0
 */
class InlineValueOptions
{
    use InlineValueOptionsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.17.0
     */
    public function __construct(bool $workDoneProgress)
    {
        $this->workDoneProgress = $workDoneProgress;
    }
}
