<?php

namespace Lsp\Protocol\Type;

/**
 * Client capabilities specific to the used markdown parser.
 *
 * @generated
 *
 * @since 3.16.0
 */
final class MarkdownClientCapabilities
{
    /**
     * @param list<string> $allowedTags
     */
    final public function __construct(
        public readonly string $parser,
        public readonly string $version,
        public readonly array $allowedTags,
    ) {}
}
