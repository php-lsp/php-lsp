<?php

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-05-04T17:58:12+00:00
 */
abstract class PartialResultParams
{
    use PartialResultParamsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @param int<-2147483648, 2147483647>|string $partialResultToken
     */
    public function __construct(int|string $partialResultToken)
    {
        $this->partialResultToken = $partialResultToken;
    }
}
