<?php

namespace Lsp\Protocol\Type;

/**
 * Cancellation data returned from a diagnostic request.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.17.0
 */
final class DiagnosticServerCancellationData
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.17.0
     */
    final public function __construct(
        public readonly bool $retriggerRequest,
    ) {}
}
