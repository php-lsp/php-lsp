<?php

namespace Lsp\Protocol\Type;

/**
 * A special text edit with an additional change annotation.
 *
 * @generated
 * @since 3.16.0.
 */
final class AnnotatedTextEdit
{
    use TextEditMixin;

    final public function __construct(
        public readonly string $annotationId,
        Range $range,
        string $newText,
    ) {
        $this->range = $range;

        $this->newText = $newText;
    }
}
