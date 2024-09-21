<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-09-21
 */
trait WorkDoneProgressParamsMixin
{
    /**
     * An optional token that a server can use to report work done progress.
     *
     * @var int<-2147483648, 2147483647>|string|null
     *
     * @readonly
     */
    public int|string|null $workDoneToken = null;
}
