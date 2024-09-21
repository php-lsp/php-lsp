<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Parameters for a {@link SignatureHelpRequest}.
 *
 * @generated 2024-09-21
 */
final class SignatureHelpParams
{
    use TextDocumentPositionParamsMixin;
    use WorkDoneProgressParamsMixin;

    /**
     * @param TextDocumentIdentifier $textDocument the text document
     * @param Position $position the position inside the text document
     * @param int<-2147483648, 2147483647>|string|null $workDoneToken an
     *        optional token that a server can use to report work done progress
     */
    public function __construct(
        TextDocumentIdentifier $textDocument,
        Position $position,
        /**
         * The signature help context. This is only available if the client
         * specifies to send this using the client capability
         * `textDocument.signatureHelp.contextSupport === true`.
         *
         * @since 3.15.0
         */
        public readonly ?SignatureHelpContext $context = null,
        int|string|null $workDoneToken = null,
    ) {
        $this->textDocument = $textDocument;
        $this->position = $position;
        $this->workDoneToken = $workDoneToken;
    }
}
