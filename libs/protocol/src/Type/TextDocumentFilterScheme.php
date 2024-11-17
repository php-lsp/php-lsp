<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A document filter where `scheme` is required field.
 *
 * @since 3.18.0
 */
final class TextDocumentFilterScheme
{
    public function __construct(
        /**
         * A Uri {@see Uri::$scheme scheme}, like `file` or `untitled`.
         */
        public readonly string $scheme,
        /**
         * A language id, like `typescript`.
         */
        public readonly ?string $language = null,
        /**
         * A glob pattern, like **​/*.{ts,js}. See TextDocumentFilter for
         * examples.
         *
         * @since 3.18.0 - support for relative patterns.
         */
        public readonly string|RelativePattern|null $pattern = null,
    ) {}
}
