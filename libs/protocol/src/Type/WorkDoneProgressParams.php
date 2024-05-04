<?php

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-05-04T17:58:12+00:00
 */
abstract class WorkDoneProgressParams
{
    use WorkDoneProgressParamsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @param int<-2147483648, 2147483647>|string $workDoneToken
     */
    public function __construct(int|string $workDoneToken)
    {
        $this->workDoneToken = $workDoneToken;
    }
}
