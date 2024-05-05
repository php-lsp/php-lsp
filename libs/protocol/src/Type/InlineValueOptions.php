<?php

namespace Lsp\Protocol\Type;

/**
 * Inline value options used during static registration.
 *
 * @generated
 * @since 3.17.0
 */
class InlineValueOptions
{
    use InlineValueOptionsMixin;

    /**
     * @generated
     * @since 3.17.0
     */
    public function __construct(bool $workDoneProgress)
    {
        $this->workDoneProgress = $workDoneProgress;
    }
}
