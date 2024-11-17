<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The parameter of a `textDocument/prepareTypeHierarchy` request.
 *
 * @since 3.17.0
 */
final class TypeHierarchyPrepareParams
{
    public function __construct(
        /**
         * The text document.
         */
        public readonly TextDocumentIdentifier $textDocument,
        /**
         * The position inside the text document.
         */
        public readonly Position $position,
        /**
         * An optional token that a server can use to report work done progress.
         *
         * @var int<-2147483648, 2147483647>|string|null
         */
        public readonly int|string|null $workDoneToken = null,
    ) {}
}
