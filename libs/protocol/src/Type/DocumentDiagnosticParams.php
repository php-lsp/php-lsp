<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Parameters of the document diagnostic request.
 *
 * @since 3.17.0
 *
 * @generated 2024-09-21
 */
final class DocumentDiagnosticParams
{
    use WorkDoneProgressParamsMixin;
    use PartialResultParamsMixin;

    /**
     * @param int<-2147483648, 2147483647>|string|null $workDoneToken an
     *        optional token that a server can use to report work done progress
     * @param int<-2147483648, 2147483647>|string|null $partialResultToken An
     *        optional token that a server can use to report partial results (e.g.
     *        streaming) to the client.
     */
    public function __construct(
        /**
         * The text document.
         */
        public readonly TextDocumentIdentifier $textDocument,
        /**
         * The additional identifier  provided during registration.
         */
        public readonly ?string $identifier = null,
        /**
         * The result id of a previous response if provided.
         */
        public readonly ?string $previousResultId = null,
        int|string|null $workDoneToken = null,
        int|string|null $partialResultToken = null,
    ) {
        $this->workDoneToken = $workDoneToken;
        $this->partialResultToken = $partialResultToken;
    }
}
