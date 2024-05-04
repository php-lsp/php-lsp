<?php

namespace Lsp\Protocol\Type;

/**
 * The parameters of a {@link RenameRequest}.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class RenameParams
{
    use WorkDoneProgressParamsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(
        public readonly TextDocumentIdentifier $textDocument,
        public readonly Position $position,
        public readonly string $newName,
        int|string $workDoneToken,
    ) {
        $this->workDoneToken = $workDoneToken;
    }
}
