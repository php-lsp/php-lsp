<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A document highlight is a range inside a text document which deserves special
 * attention. Usually a document highlight is visualized by changing the
 * background color of its range.
 *
 * @generated 2024-11-14
 */
final class DocumentHighlight
{
    public function __construct(
        /**
         * The range this highlight applies to.
         */
        public readonly Range $range,
        /**
         * The highlight kind, default is {@see DocumentHighlightKind::$Text
         * text}.
         */
        public readonly ?DocumentHighlightKind $kind = null,
    ) {}
}
