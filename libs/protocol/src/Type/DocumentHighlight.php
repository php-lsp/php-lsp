<?php

namespace Lsp\Protocol\Type;

/**
 * A document highlight is a range inside a text document which deserves
 * special attention. Usually a document highlight is visualized by changing
 * the background color of its range.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class DocumentHighlight
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(
        public readonly Range $range,
        public readonly DocumentHighlightKind $kind,
    ) {}
}
