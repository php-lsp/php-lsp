<?php

namespace Lsp\Protocol\Type;

/**
 * Inlay hint options used during static registration.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.17.0
 */
class InlayHintOptions
{
    use InlayHintOptionsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.17.0
     */
    public function __construct(bool $resolveProvider, bool $workDoneProgress)
    {
        $this->resolveProvider = $resolveProvider;

        $this->workDoneProgress = $workDoneProgress;
    }
}
