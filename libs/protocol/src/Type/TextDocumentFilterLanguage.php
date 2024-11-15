<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A document filter where `language` is required field.
 *
 * @since 3.18.0
 *
 * @generated 2024-11-15
 */
final class TextDocumentFilterLanguage
{
    public function __construct(
        /**
         * A language id, like `typescript`.
         */
        public readonly string $language,
        /**
         * A Uri {@see Uri::$scheme scheme}, like `file` or `untitled`.
         */
        public readonly ?string $scheme = null,
        /**
         * A glob pattern, like **​/*.{ts,js}. See TextDocumentFilter for
         * examples.
         *
         * @since 3.18.0 - support for relative patterns.
         */
        public readonly string|RelativePattern|null $pattern = null,
    ) {}
}
