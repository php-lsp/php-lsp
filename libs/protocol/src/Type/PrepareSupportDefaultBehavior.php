<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-09-21
 */
enum PrepareSupportDefaultBehavior: int
{
    /**
     * The client's default behavior is to select the identifier according the
     * to language's syntax rule.
     *
     * @var int<0, 2147483647>
     */
    case Identifier = 1;
}
