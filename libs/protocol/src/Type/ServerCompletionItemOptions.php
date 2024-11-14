<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @since 3.18.0
 *
 * @generated 2024-11-14
 */
final class ServerCompletionItemOptions
{
    public function __construct(
        /**
         * The server has support for completion item label details (see also
         * `CompletionItemLabelDetails`) when receiving a completion item in a
         * resolve call.
         *
         * @since 3.17.0
         */
        public readonly ?bool $labelDetailsSupport = null,
    ) {}
}
