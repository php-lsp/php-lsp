<?php

namespace Lsp\Protocol\Type;

/**
 * Inlay hint options used during static registration.
 *
 * @generated
 * @since 3.17.0
 */
class InlayHintOptions
{
    use InlayHintOptionsMixin;

    public function __construct(bool $resolveProvider, bool $workDoneProgress)
    {
        $this->resolveProvider = $resolveProvider;

        $this->workDoneProgress = $workDoneProgress;
    }
}
