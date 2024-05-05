<?php

namespace Lsp\Protocol\Type;

/**
 * Parameters of the document diagnostic request.
 *
 * @generated
 * @since 3.17.0
 */
final class DocumentDiagnosticParams
{
    use WorkDoneProgressParamsMixin;

    use PartialResultParamsMixin;

    /**
     * @param int<-2147483648, 2147483647>|string $workDoneToken
     * @param int<-2147483648, 2147483647>|string $partialResultToken
     */
    final public function __construct(
        public readonly TextDocumentIdentifier $textDocument,
        public readonly string $identifier,
        public readonly string $previousResultId,
        int|string $workDoneToken,
        int|string $partialResultToken,
    ) {
            $this->workDoneToken = $workDoneToken;
    
            $this->partialResultToken = $partialResultToken;
    }
}