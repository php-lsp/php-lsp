<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
abstract class PartialResultParams
{
    use PartialResultParamsMixin;

    /**
     * @param int<-2147483648, 2147483647>|string $partialResultToken
     */
    public function __construct(int|string $partialResultToken)
    {
        $this->partialResultToken = $partialResultToken;
    }
}
