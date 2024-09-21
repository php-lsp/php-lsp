<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-09-21
 */
final class TextDocumentRegistrationOptionsDocumentSelector
{
    public function __construct(
        /**
         * A glob pattern, like **​/*.{ts,js}. See TextDocumentFilter for
         * examples.
         */
        public readonly string $pattern,
        /**
         * A language id, like `typescript`.
         */
        public readonly ?string $language = null,
        /**
         * A Uri {@see Uri::$scheme scheme}, like `file` or `untitled`.
         */
        public readonly ?string $scheme = null,
    ) {}
}
