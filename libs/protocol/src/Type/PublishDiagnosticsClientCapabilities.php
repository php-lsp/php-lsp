<?php

namespace Lsp\Protocol\Type;

/**
 * The publish diagnostic client capabilities.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class PublishDiagnosticsClientCapabilities
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(
        public readonly bool $relatedInformation,
        public readonly object $tagSupport,
        public readonly bool $versionSupport,
        public readonly bool $codeDescriptionSupport,
        public readonly bool $dataSupport,
    ) {}
}
