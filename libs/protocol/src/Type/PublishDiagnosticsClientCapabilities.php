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
        public readonly bool|null $relatedInformation = null,
        public readonly PublishDiagnosticsClientCapabilitiesTagSupport|null $tagSupport = null,
        public readonly bool|null $versionSupport = null,
        public readonly bool|null $codeDescriptionSupport = null,
        public readonly bool|null $dataSupport = null,
    ) {}
}