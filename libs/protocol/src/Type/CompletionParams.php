<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Completion parameters.
 *
 * @generated 2024-11-15
 */
final class CompletionParams
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
         * The completion context. This is only available if the client
         * specifies to send this using the client capability
         * `textDocument.completion.contextSupport === true`.
         */
        public readonly ?CompletionContext $context = null,
        /**
         * An optional token that a server can use to report work done progress.
         *
         * @var int<-2147483648, 2147483647>|string|null
         */
        public readonly int|string|null $workDoneToken = null,
        /**
         * An optional token that a server can use to report partial results
         * (e.g. streaming) to the client.
         *
         * @var int<-2147483648, 2147483647>|string|null
         */
        public readonly int|string|null $partialResultToken = null,
    ) {}
}
