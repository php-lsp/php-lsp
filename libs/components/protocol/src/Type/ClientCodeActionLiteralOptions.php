<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @since 3.18.0
 */
final class ClientCodeActionLiteralOptions
{
    public function __construct(
        /**
         * The code action kind is support with the following value set.
         */
        public readonly ClientCodeActionKindOptions $codeActionKind,
    ) {}
}
