<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-09-21
 */
final class ColorPresentation
{
    public function __construct(
        /**
         * The label of this color presentation. It will be shown on the color
         * picker header. By default this is also the text that is inserted when
         * selecting this color presentation.
         */
        public readonly string $label,
        /**
         * An {@link TextEdit edit} which is applied to a document when
         * selecting this presentation for the color.  When `falsy` the {@see
         * ColorPresentation::$label label}
         * is used.
         */
        public readonly ?TextEdit $textEdit = null,
        /**
         * An optional array of additional {@link TextEdit text edits} that are
         * applied when selecting this color presentation. Edits must not
         * overlap with the main {@see ColorPresentation::$textEdit edit} nor
         * with themselves.
         *
         * @var list<TextEdit>|null
         */
        public readonly ?array $additionalTextEdits = null,
    ) {}
}
