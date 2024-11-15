<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The publish diagnostic notification's parameters.
 *
 * @generated 2024-11-15
 */
final class PublishDiagnosticsParams
{
    public function __construct(
        /**
         * The URI for which diagnostic information is reported.
         *
         * @var non-empty-string
         */
        public readonly string $uri,
        /**
         * Optional the version number of the document the diagnostics are
         * published for.
         *
         * @since 3.15.0
         *
         * @var int<-2147483648, 2147483647>|null
         */
        public readonly ?int $version = null,
        /**
         * An array of diagnostic information items.
         *
         * @var list<Diagnostic>
         */
        public readonly array $diagnostics = [],
    ) {}
}
