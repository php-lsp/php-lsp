<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
final class ColorPresentation
{
    /**
     * @param list<TextEdit>|null $additionalTextEdits
     */
    final public function __construct(
        public readonly string $label,
        public readonly TextEdit|null $textEdit = null,
        public readonly array|null $additionalTextEdits = null,
    ) {}
}