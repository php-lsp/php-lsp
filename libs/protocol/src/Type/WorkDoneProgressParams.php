<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
abstract class WorkDoneProgressParams
{
    use WorkDoneProgressParamsMixin;

    /**
     * @generated
     * @param int<-2147483648, 2147483647>|string $workDoneToken
     */
    public function __construct(int|string $workDoneToken)
    {
        $this->workDoneToken = $workDoneToken;
    }
}
