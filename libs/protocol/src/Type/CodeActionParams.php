<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The parameters of a {@link CodeActionRequest}.
 *
 * @generated 2024-11-14
 */
final class CodeActionParams
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
         * The document in which the command was invoked.
         */
        public readonly TextDocumentIdentifier $textDocument,
        /**
         * The range for which the command was invoked.
         */
        public readonly Range $range,
        /**
         * Context carrying additional information.
         */
        public readonly CodeActionContext $context,
        int|string|null $workDoneToken = null,
        int|string|null $partialResultToken = null,
    ) {
        $this->workDoneToken = $workDoneToken;
        $this->partialResultToken = $partialResultToken;
    }
}
