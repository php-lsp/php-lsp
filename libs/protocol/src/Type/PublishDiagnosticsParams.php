<?php

namespace Lsp\Protocol\Type;

/**
 * The publish diagnostic notification's parameters.
 *
 * @generated
 */
final class PublishDiagnosticsParams
{
    /**
     * @param non-empty-string $uri
     * @param int<-2147483648, 2147483647> $version
     * @param list<Diagnostic> $diagnostics
     */
    final public function __construct(
        public readonly string $uri,
        public readonly int $version,
        public readonly array $diagnostics,
    ) {}
}