<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Represents a related message and source code location for a diagnostic. This
 * should be used to point to code locations that cause or related to a
 * diagnostics, e.g when duplicating a symbol in a scope.
 */
final class DiagnosticRelatedInformation
{
    public function __construct(
        /**
         * The location of this related diagnostic information.
         */
        public readonly Location $location,
        /**
         * The message of this related diagnostic information.
         */
        public readonly string $message,
    ) {}
}
