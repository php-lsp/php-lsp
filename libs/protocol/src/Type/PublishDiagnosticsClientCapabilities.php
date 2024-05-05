<?php

namespace Lsp\Protocol\Type;

/**
 * The publish diagnostic client capabilities.
 *
 * @generated
 */
final class PublishDiagnosticsClientCapabilities
{
    final public function __construct(
        public readonly bool $relatedInformation,
        public readonly PublishDiagnosticsClientCapabilitiesTagSupport $tagSupport,
        public readonly bool $versionSupport,
        public readonly bool $codeDescriptionSupport,
        public readonly bool $dataSupport,
    ) {}
}