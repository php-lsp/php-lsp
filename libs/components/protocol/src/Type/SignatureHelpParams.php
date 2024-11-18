<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Parameters for a {@link SignatureHelpRequest}.
 */
final class SignatureHelpParams
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
         * The signature help context. This is only available if the client
         * specifies to send this using the client capability
         * `textDocument.signatureHelp.contextSupport === true`.
         *
         * @since 3.15.0
         */
        public readonly ?SignatureHelpContext $context = null,
        /**
         * An optional token that a server can use to report work done progress.
         *
         * @var int<-2147483648, 2147483647>|string|null
         */
        public readonly int|string|null $workDoneToken = null,
    ) {}
}
