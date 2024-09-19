<?php

namespace Lsp\Protocol\Type;

/**
 * The parameter of a `typeHierarchy/subtypes` request.
 *
 * @generated
 * @since 3.17.0
 */
final class TypeHierarchySubtypesParams
{
    use WorkDoneProgressParamsMixin;

    use PartialResultParamsMixin;

    /**
     * @param int<-2147483648, 2147483647>|string|null $workDoneToken
     * @param int<-2147483648, 2147483647>|string|null $partialResultToken
     */
    final public function __construct(
        public readonly TypeHierarchyItem $item,
        int|string|null $workDoneToken = null,
        int|string|null $partialResultToken = null,
    ) {
            $this->workDoneToken = $workDoneToken;
    
            $this->partialResultToken = $partialResultToken;
    }
}