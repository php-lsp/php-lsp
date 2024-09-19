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
     * @param int<-2147483648, 2147483647>|null $version
     * @param list<Diagnostic> $diagnostics
     */
    final public function __construct(
        public readonly string $uri,
        public readonly array $diagnostics,
        public readonly int|null $version = null,
    ) {}
}