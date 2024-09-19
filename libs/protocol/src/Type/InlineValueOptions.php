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

    public function __construct(bool|null $workDoneProgress)
    {
            $this->workDoneProgress = $workDoneProgress;
    }
}