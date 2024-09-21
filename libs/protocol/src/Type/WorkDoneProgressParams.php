<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-09-21
 */
final class WorkDoneProgressParams
{
    use WorkDoneProgressParamsMixin;

    /**
     * @param int<-2147483648, 2147483647>|string|null $workDoneToken an
     *        optional token that a server can use to report work done progress
     */
    public function __construct(int|string|null $workDoneToken = null)
    {
        $this->workDoneToken = $workDoneToken;
    }
}
