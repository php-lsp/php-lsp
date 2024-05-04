<?php

namespace Lsp\Protocol\Type;

/**
 * The parameter of a `typeHierarchy/subtypes` request.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.17.0
 */
final class TypeHierarchySubtypesParams
{
    use WorkDoneProgressParamsMixin;

    use PartialResultParamsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
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
