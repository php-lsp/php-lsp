<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
abstract class WorkDoneProgressParams
{
    use WorkDoneProgressParamsMixin;

    /**
     * @param int<-2147483648, 2147483647>|string|null $workDoneToken
     */
    public function __construct(int|string|null $workDoneToken)
    {
            $this->workDoneToken = $workDoneToken;
    }
}