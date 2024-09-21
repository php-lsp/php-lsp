<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The parameters of a {@link RenameRequest}.
 *
 * @generated 2024-09-21
 */
final class RenameParams
{
    use WorkDoneProgressParamsMixin;

    /**
     * @param int<-2147483648, 2147483647>|string|null $workDoneToken an
     *        optional token that a server can use to report work done progress
     */
    public function __construct(
        /**
         * The document to rename.
         */
        public readonly TextDocumentIdentifier $textDocument,
        /**
         * The position at which this request was sent.
         */
        public readonly Position $position,
        /**
         * The new name of the symbol. If the given name is not valid the
         * request must return a {@link ResponseError} with an appropriate
         * message set.
         */
        public readonly string $newName,
        int|string|null $workDoneToken = null,
    ) {
        $this->workDoneToken = $workDoneToken;
    }
}
