<?php

namespace Lsp\Protocol\Type;

trait InlayHintOptionsMixin
{
    use WorkDoneProgressOptionsMixin;

    /**
     * The server provides support to resolve additional
     * information for an inlay hint item.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    public readonly bool $resolveProvider;
}
