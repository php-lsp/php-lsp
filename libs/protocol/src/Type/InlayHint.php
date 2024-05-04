<?php

namespace Lsp\Protocol\Type;

/**
 * Inlay hint information.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.17.0
 */
final class InlayHint
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.17.0
     * @param string|list<InlayHintLabelPart> $label
     * @param list<TextEdit> $textEdits
     */
    final public function __construct(
        public readonly Position $position,
        public readonly string|array $label,
        public readonly InlayHintKind $kind,
        public readonly array $textEdits,
        public readonly string|MarkupContent $tooltip,
        public readonly bool $paddingLeft,
        public readonly bool $paddingRight,
        public readonly mixed $data,
    ) {}
}
