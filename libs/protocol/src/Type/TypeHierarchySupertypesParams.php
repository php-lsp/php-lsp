<?php

namespace Lsp\Protocol\Type;

/**
 * The parameter of a `typeHierarchy/supertypes` request.
 *
 * @generated
 * @since 3.17.0
 */
final class TypeHierarchySupertypesParams
{
    use WorkDoneProgressParamsMixin;

    use PartialResultParamsMixin;

    /**
     * @param int<-2147483648, 2147483647>|string $workDoneToken
     * @param int<-2147483648, 2147483647>|string $partialResultToken
     */
    final public function __construct(
        public readonly TypeHierarchyItem $item,
        int|string $workDoneToken,
        int|string $partialResultToken,
    ) {
            $this->workDoneToken = $workDoneToken;
    
            $this->partialResultToken = $partialResultToken;
    }
}