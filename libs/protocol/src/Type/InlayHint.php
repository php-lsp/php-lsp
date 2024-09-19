<?php

namespace Lsp\Protocol\Type;

/**
 * Inlay hint information.
 *
 * @generated
 * @since 3.17.0
 */
final class InlayHint
{
    /**
     * @param string|list<InlayHintLabelPart> $label
     * @param list<TextEdit>|null $textEdits
     */
    final public function __construct(
        public readonly Position $position,
        public readonly string|array $label,
        public readonly InlayHintKind|null $kind = null,
        public readonly array|null $textEdits = null,
        public readonly string|MarkupContent|null $tooltip = null,
        public readonly bool|null $paddingLeft = null,
        public readonly bool|null $paddingRight = null,
        public readonly mixed $data = null,
    ) {}
}