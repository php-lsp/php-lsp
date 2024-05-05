<?php

namespace Lsp\Protocol\Type;

trait InlayHintOptionsMixin
{
    use WorkDoneProgressOptionsMixin;

    /**
     * The server provides support to resolve additional
     * information for an inlay hint item.
     *
     * @generated
     */
    public readonly bool $resolveProvider;
}
