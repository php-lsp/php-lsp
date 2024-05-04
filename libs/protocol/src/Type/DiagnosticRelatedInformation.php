<?php

namespace Lsp\Protocol\Type;

/**
 * Represents a related message and source code location for a diagnostic. This should be
 * used to point to code locations that cause or related to a diagnostics, e.g when duplicating
 * a symbol in a scope.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class DiagnosticRelatedInformation
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(
        public readonly Location $location,
        public readonly string $message,
    ) {}
}
