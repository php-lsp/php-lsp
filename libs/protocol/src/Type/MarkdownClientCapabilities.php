<?php

namespace Lsp\Protocol\Type;

/**
 * Client capabilities specific to the used markdown parser.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.16.0
 */
final class MarkdownClientCapabilities
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.16.0
     * @param list<string> $allowedTags
     */
    final public function __construct(
        public readonly string $parser,
        public readonly string $version,
        public readonly array $allowedTags,
    ) {}
}
