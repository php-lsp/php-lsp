<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The parameters of a {@link RenameRequest}.
 *
 * @generated 2024-11-15
 */
final class RenameParams
{
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
        /**
         * An optional token that a server can use to report work done progress.
         *
         * @var int<-2147483648, 2147483647>|string|null
         */
        public readonly int|string|null $workDoneToken = null,
    ) {}
}
