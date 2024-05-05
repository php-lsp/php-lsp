<?php

namespace Lsp\Protocol\Type;

/**
 * Params to show a resource in the UI.
 *
 * @generated
 * @since 3.16.0
 */
final class ShowDocumentParams
{
    /**
     * @generated
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
