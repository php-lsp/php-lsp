<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

final class MessageActionItem
{
    public function __construct(
        /**
         * A short title like 'Retry', 'Open Log' etc.
         */
        public readonly string $title,
    ) {}
}
