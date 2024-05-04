<?php

namespace Lsp\Protocol\Type;

/**
 * A special text edit with an additional change annotation.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.16.0.
 */
final class AnnotatedTextEdit
{
    use TextEditMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.16.0.
     */
    final public function __construct(
        public readonly string $annotationId,
        Range $range,
        string $newText,
    ) {
        $this->range = $range;

        $this->newText = $newText;
    }
}
