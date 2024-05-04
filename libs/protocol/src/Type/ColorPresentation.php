<?php

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-05-04T17:58:12+00:00
 */
final class ColorPresentation
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @param list<TextEdit> $additionalTextEdits
     */
    final public function __construct(
        public readonly string $label,
        public readonly TextEdit $textEdit,
        public readonly array $additionalTextEdits,
    ) {}
}
