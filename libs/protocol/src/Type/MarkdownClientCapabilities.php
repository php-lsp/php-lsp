<?php

namespace Lsp\Protocol\Type;

/**
 * Client capabilities specific to the used markdown parser.
 *
 * @generated
 * @since 3.16.0
 */
final class MarkdownClientCapabilities
{
    /**
     * @param list<string>|null $allowedTags
     */
    final public function __construct(
        public readonly string $parser,
        public readonly string|null $version = null,
        public readonly array|null $allowedTags = null,
    ) {}
}