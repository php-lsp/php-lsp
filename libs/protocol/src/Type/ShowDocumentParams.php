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
     * @param non-empty-string $uri
     */
    final public function __construct(
        public readonly string $uri,
        public readonly bool|null $external = null,
        public readonly bool|null $takeFocus = null,
        public readonly Range|null $selection = null,
    ) {}
}