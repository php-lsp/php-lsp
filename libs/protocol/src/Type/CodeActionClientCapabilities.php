<?php

namespace Lsp\Protocol\Type;

/**
 * The Client Capabilities of a {@link CodeActionRequest}.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class CodeActionClientCapabilities
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(
        public readonly bool $dynamicRegistration,
        public readonly object $codeActionLiteralSupport,
        public readonly bool $isPreferredSupport,
        public readonly bool $disabledSupport,
        public readonly bool $dataSupport,
        public readonly object $resolveSupport,
        public readonly bool $honorsChangeAnnotations,
    ) {}
}
