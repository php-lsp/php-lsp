<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Cancellation data returned from a diagnostic request.
 *
 * @since 3.17.0
 */
final class DiagnosticServerCancellationData
{
    public function __construct(
        public readonly bool $retriggerRequest,
    ) {}
}
