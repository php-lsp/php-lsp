<?php

namespace Lsp\Protocol;

enum PrepareSupportDefaultBehavior: int
{
    /**
     * The client's default behavior is to select the identifier
     * according the to language's syntax rule.
     */
    case Identifier = 1;
}
