<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @since 3.16.0
 */
final class SemanticTokensDeltaParams
{
    public function __construct(
        /**
         * The text document.
         */
        public readonly TextDocumentIdentifier $textDocument,
        /**
         * The result id of a previous response. The result Id can either point
         * to a full response or a delta response depending on what was received
         * last.
         */
        public readonly string $previousResultId,
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
