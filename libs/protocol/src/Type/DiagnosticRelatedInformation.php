<?php

namespace Lsp\Protocol\Type;

/**
 * Represents a related message and source code location for a diagnostic. This should be
 * used to point to code locations that cause or related to a diagnostics, e.g when duplicating
 * a symbol in a scope.
 *
 * @generated
 */
final class DiagnosticRelatedInformation
{
    /**
     * @generated
     */
    final public function __construct(
        public readonly Location $location,
        public readonly string $message,
    ) {}
}
