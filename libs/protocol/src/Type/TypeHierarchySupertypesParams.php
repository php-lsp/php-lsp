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
     * @generated
     * @since 3.17.0
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
