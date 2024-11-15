<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Parameters of the workspace diagnostic request.
 *
 * @since 3.17.0
 *
 * @generated 2024-11-15
 */
final class WorkspaceDiagnosticParams
{
    public function __construct(
        /**
         * The additional identifier provided during registration.
         */
        public readonly ?string $identifier = null,
        /**
         * The currently known diagnostic reports with their previous result
         * ids.
         *
         * @var list<PreviousResultId>
         */
        public readonly array $previousResultIds = [],
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
