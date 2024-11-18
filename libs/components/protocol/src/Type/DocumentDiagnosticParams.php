<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Parameters of the document diagnostic request.
 *
 * @since 3.17.0
 */
final class DocumentDiagnosticParams
{
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
