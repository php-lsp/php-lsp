<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A special text edit with an additional change annotation.
 *
 * @since 3.16.0.
 */
final class AnnotatedTextEdit
{
    public function __construct(
        /**
         * The actual identifier of the change annotation.
         */
        public readonly string $annotationId,
        /**
         * The range of the text document to be manipulated. To insert text into
         * a document create a range where start === end.
         */
        public readonly Range $range,
        /**
         * The string to be inserted. For delete operations use an empty string.
         */
        public readonly string $newText,
    ) {}
}
