<?php

namespace Lsp\Protocol\Type;

/**
 * Cancellation data returned from a diagnostic request.
 *
 * @generated
 *
 * @since 3.17.0
 */
final class DiagnosticServerCancellationData
{
    final public function __construct(
        public readonly bool $retriggerRequest,
    ) {}
}
