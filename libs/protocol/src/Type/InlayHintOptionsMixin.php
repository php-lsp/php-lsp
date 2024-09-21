<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Inlay hint options used during static registration.
 *
 * @since 3.17.0
 *
 * @generated 2024-09-21
 */
trait InlayHintOptionsMixin
{
    use WorkDoneProgressOptionsMixin;
    /**
     * The server provides support to resolve additional information for an
     * inlay hint item.
     *
     * @readonly
     */
    public ?bool $resolveProvider = null;
}
