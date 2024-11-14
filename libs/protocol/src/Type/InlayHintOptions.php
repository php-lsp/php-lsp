<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Inlay hint options used during static registration.
 *
 * @since 3.17.0
 *
 * @generated 2024-11-14
 */
final class InlayHintOptions
{
    use InlayHintOptionsMixin;

    /**
     * @param bool|null $resolveProvider the server provides support to resolve
     *        additional information for an inlay hint item
     */
    public function __construct(?bool $resolveProvider = null, ?bool $workDoneProgress = null)
    {
        $this->resolveProvider = $resolveProvider;
        $this->workDoneProgress = $workDoneProgress;
    }
}
