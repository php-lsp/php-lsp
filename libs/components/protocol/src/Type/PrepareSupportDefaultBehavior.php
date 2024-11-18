<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

enum PrepareSupportDefaultBehavior: int
{
    /**
     * The client's default behavior is to select the identifier according the
     * to language's syntax rule.
     */
    case Identifier = 1;
}
