<?php

namespace Lsp\Protocol\Type;

/**
 * The parameters of a {@link RenameRequest}.
 *
 * @generated
 */
final class RenameParams
{
    use WorkDoneProgressParamsMixin;

    /**
     * @param int<-2147483648, 2147483647>|string $workDoneToken
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
