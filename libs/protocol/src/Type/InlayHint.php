<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Inlay hint information.
 *
 * @since 3.17.0
 */
final class InlayHint
{
    public function __construct(
        /**
         * The position of this hint.
         *
         * If multiple hints have the same position, they will be shown in the
         * order they appear in the response.
         */
        public readonly Position $position,
        /**
         * The label of this hint. A human readable string or an array of
         * InlayHintLabelPart label parts.
         *
         * *Note* that neither the string nor the label part can be empty.
         *
         * @var string|list<InlayHintLabelPart>
         */
        public readonly string|array $label = [],
        /**
         * The kind of this hint. Can be omitted in which case the client should
         * fall back to a reasonable default.
         */
        public readonly ?InlayHintKind $kind = null,
        /**
         * Optional text edits that are performed when accepting this inlay
         * hint.
         *
         * *Note* that edits are expected to change the document so that the
         * inlay hint (or its nearest variant) is now part of the document and
         * the inlay hint itself is now obsolete.
         *
         * @var list<TextEdit>|null
         */
        public readonly ?array $textEdits = null,
        /**
         * The tooltip text when you hover over this item.
         */
        public readonly MarkupContent|string|null $tooltip = null,
        /**
         * Render padding before the hint.
         *
         * Note: Padding should use the editor's background color, not the
         * background color of the hint itself. That means padding can be used
         * to visually align/separate an inlay hint.
         */
        public readonly ?bool $paddingLeft = null,
        /**
         * Render padding after the hint.
         *
         * Note: Padding should use the editor's background color, not the
         * background color of the hint itself. That means padding can be used
         * to visually align/separate an inlay hint.
         */
        public readonly ?bool $paddingRight = null,
        /**
         * A data entry field that is preserved on an inlay hint between a
         * `textDocument/inlayHint` and a `inlayHint/resolve` request.
         */
        public readonly mixed $data = null,
    ) {}
}
