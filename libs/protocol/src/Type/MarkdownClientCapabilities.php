<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Client capabilities specific to the used markdown parser.
 *
 * @since 3.16.0
 *
 * @generated 2024-11-14
 */
final class MarkdownClientCapabilities
{
    public function __construct(
        /**
         * The name of the parser.
         */
        public readonly string $parser,
        /**
         * The version of the parser.
         */
        public readonly ?string $version = null,
        /**
         * A list of HTML tags that the client allows / supports in Markdown.
         *
         * @since 3.17.0
         *
         * @var list<string>|null
         */
        public readonly ?array $allowedTags = null,
    ) {}
}
