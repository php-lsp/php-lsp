<?php

namespace Lsp\Protocol\Type;

trait DocumentRangeFormattingOptionsMixin
{
    use WorkDoneProgressOptionsMixin;

    /**
     * Whether the server supports formatting multiple ranges at once.
     *
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.18.0
     * @internal Describes the upcoming version of the Language Server Protocol and is under development
     */
    public readonly bool $rangesSupport;
}
