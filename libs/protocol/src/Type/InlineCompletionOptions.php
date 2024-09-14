<?php

namespace Lsp\Protocol\Type;

/**
 * Inline completion options used during static registration.
 *
 * @generated
 *
 * @since 3.18.0
 *
 * @internal Describes the upcoming version of the Language Server Protocol and is under development
 */
class InlineCompletionOptions
{
    use InlineCompletionOptionsMixin;

    public function __construct(bool $workDoneProgress)
    {
        $this->workDoneProgress = $workDoneProgress;
    }
}
