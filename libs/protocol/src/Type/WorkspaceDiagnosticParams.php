<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Parameters of the workspace diagnostic request.
 *
 * @since 3.17.0
 *
 * @generated 2024-11-14
 */
final class WorkspaceDiagnosticParams
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
        int|string|null $workDoneToken = null,
        int|string|null $partialResultToken = null,
    ) {
        $this->workDoneToken = $workDoneToken;
        $this->partialResultToken = $partialResultToken;
    }
}
