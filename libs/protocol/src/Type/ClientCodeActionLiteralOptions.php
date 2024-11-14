<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @since 3.18.0
 *
 * @generated 2024-11-14
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
