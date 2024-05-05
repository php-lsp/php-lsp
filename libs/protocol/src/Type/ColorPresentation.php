<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
final class ColorPresentation
{
    /**
     * @generated
     * @param list<TextEdit> $additionalTextEdits
     */
    final public function __construct(
        public readonly string $label,
        public readonly TextEdit $textEdit,
        public readonly array $additionalTextEdits,
    ) {}
}
