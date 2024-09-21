<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A special text edit with an additional change annotation.
 *
 * @since 3.16.0.
 *
 * @generated 2024-09-21
 */
final class AnnotatedTextEdit
{
    use TextEditMixin;

    /**
     * @param Range $range The range of the text document to be manipulated. To
     *        insert text into a document create a range where start === end.
     * @param string $newText The string to be inserted. For delete operations
     *        use an empty string.
     */
    public function __construct(
        /**
         * The actual identifier of the change annotation.
         */
        public readonly string $annotationId,
        Range $range,
        string $newText,
    ) {
        $this->range = $range;
        $this->newText = $newText;
    }
}
