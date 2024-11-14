<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Completion parameters.
 *
 * @generated 2024-11-14
 */
final class CompletionParams
{
    use TextDocumentPositionParamsMixin;
    use WorkDoneProgressParamsMixin;
    use PartialResultParamsMixin;

    /**
     * @param TextDocumentIdentifier $textDocument the text document
     * @param Position $position the position inside the text document
     * @param int<-2147483648, 2147483647>|string|null $workDoneToken an
     *        optional token that a server can use to report work done progress
     * @param int<-2147483648, 2147483647>|string|null $partialResultToken An
     *        optional token that a server can use to report partial results (e.g.
     *        streaming) to the client.
     */
    public function __construct(
        TextDocumentIdentifier $textDocument,
        Position $position,
        /**
         * The completion context. This is only available it the client
         * specifies to send this using the client capability
         * `textDocument.completion.contextSupport === true`.
         */
        public readonly ?CompletionContext $context = null,
        int|string|null $workDoneToken = null,
        int|string|null $partialResultToken = null,
    ) {
        $this->textDocument = $textDocument;
        $this->position = $position;
        $this->workDoneToken = $workDoneToken;
        $this->partialResultToken = $partialResultToken;
    }
}
