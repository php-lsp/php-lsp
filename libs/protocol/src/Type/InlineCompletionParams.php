<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A parameter literal used in inline completion requests.
 *
 * @since 3.18.0
 *
 * @internal This is a proposed type, which means that the implementation of
 *           this type is not final. Please use this type at your own risk.
 *
 * @generated 2024-11-15
 */
final class InlineCompletionParams
{
    public function __construct(
        /**
         * Additional information about the context in which inline completions
         * were requested.
         */
        public readonly InlineCompletionContext $context,
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
