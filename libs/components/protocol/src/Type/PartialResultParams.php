<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

final class PartialResultParams
{
    public function __construct(
        /**
         * An optional token that a server can use to report partial results
         * (e.g. streaming) to the client.
         *
         * @var int<-2147483648, 2147483647>|string|null
         */
        public readonly int|string|null $partialResultToken = null,
    ) {}
}
