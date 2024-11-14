<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A relative pattern is a helper to construct glob patterns that are matched
 * relatively to a base URI. The common value for a `baseUri` is a workspace
 * folder root, but it can be another absolute URI as well.
 *
 * @since 3.17.0
 *
 * @generated 2024-11-14
 */
final class RelativePattern
{
    public function __construct(
        /**
         * A workspace folder or a base URI to which this pattern will be
         * matched against relatively.
         *
         * @var WorkspaceFolder|non-empty-string
         */
        public readonly WorkspaceFolder|string $baseUri,
        /**
         * The actual glob pattern;.
         */
        public readonly string $pattern,
    ) {}
}
