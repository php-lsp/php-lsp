<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Provider options for a {@link DocumentRangeFormattingRequest}.
 *
 * @generated 2024-09-21
 */
trait DocumentRangeFormattingOptionsMixin
{
    use WorkDoneProgressOptionsMixin;
    /**
     * Whether the server supports formatting multiple ranges at once.
     *
     * @since 3.18.0
     *
     * @internal This is a proposed type, which means that the implementation of
     *           this type is not final. Please use this type at your own risk.
     *
     * @readonly
     */
    public ?bool $rangesSupport = null;
}
