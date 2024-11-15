<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The parameters of a {@link CodeActionRequest}.
 *
 * @generated 2024-11-15
 */
final class CodeActionParams
{
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
