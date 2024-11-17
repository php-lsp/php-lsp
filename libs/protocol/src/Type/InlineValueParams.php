<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A parameter literal used in inline value requests.
 *
 * @since 3.17.0
 */
final class InlineValueParams
{
    public function __construct(
        /**
         * The text document.
         */
        public readonly TextDocumentIdentifier $textDocument,
        /**
         * The document range for which inline values should be computed.
         */
        public readonly Range $range,
        /**
         * Additional information about the context in which inline values were
         * requested.
         */
        public readonly InlineValueContext $context,
        /**
         * An optional token that a server can use to report work done progress.
         *
         * @var int<-2147483648, 2147483647>|string|null
         */
        public readonly int|string|null $workDoneToken = null,
    ) {}
}
