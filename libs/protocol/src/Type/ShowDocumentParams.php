<?php

namespace Lsp\Protocol\Type;

/**
 * Params to show a resource in the UI.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.16.0
 */
final class ShowDocumentParams
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.16.0
     * @param non-empty-string $uri
     */
    final public function __construct(
        public readonly string $uri,
        public readonly bool $external,
        public readonly bool $takeFocus,
        public readonly Range $selection,
    ) {}
}
