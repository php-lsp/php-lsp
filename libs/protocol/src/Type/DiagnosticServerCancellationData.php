<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Cancellation data returned from a diagnostic request.
 *
 * @since 3.17.0
 *
 * @generated 2024-11-15
 */
final class DiagnosticServerCancellationData
{
    public function __construct(
        public readonly bool $retriggerRequest,
    ) {}
}
