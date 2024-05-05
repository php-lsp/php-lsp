<?php

namespace Lsp\Protocol\Type;

/**
 * The Client Capabilities of a {@link CodeActionRequest}.
 *
 * @generated
 */
final class CodeActionClientCapabilities
{
    final public function __construct(
        public readonly bool $dynamicRegistration,
        public readonly CodeActionClientCapabilitiesCodeActionLiteralSupport $codeActionLiteralSupport,
        public readonly bool $isPreferredSupport,
        public readonly bool $disabledSupport,
        public readonly bool $dataSupport,
        public readonly CodeActionClientCapabilitiesResolveSupport $resolveSupport,
        public readonly bool $honorsChangeAnnotations,
    ) {}
}