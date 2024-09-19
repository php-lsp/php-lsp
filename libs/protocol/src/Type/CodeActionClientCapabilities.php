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
        public readonly bool|null $dynamicRegistration = null,
        public readonly CodeActionClientCapabilitiesCodeActionLiteralSupport|null $codeActionLiteralSupport = null,
        public readonly bool|null $isPreferredSupport = null,
        public readonly bool|null $disabledSupport = null,
        public readonly bool|null $dataSupport = null,
        public readonly CodeActionClientCapabilitiesResolveSupport|null $resolveSupport = null,
        public readonly bool|null $honorsChangeAnnotations = null,
    ) {}
}