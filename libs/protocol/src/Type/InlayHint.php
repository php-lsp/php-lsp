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