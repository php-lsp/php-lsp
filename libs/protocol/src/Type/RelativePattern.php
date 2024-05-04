<?php

namespace Lsp\Protocol\Type;

/**
 * A relative pattern is a helper to construct glob patterns that are matched
 * relatively to a base URI. The common value for a `baseUri` is a workspace
 * folder root, but it can be another absolute URI as well.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.17.0
 */
final class RelativePattern
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.17.0
     * @param WorkspaceFolder|non-empty-string $baseUri
     */
    final public function __construct(
        public readonly WorkspaceFolder|string $baseUri,
        public readonly string $pattern,
    ) {}
}
