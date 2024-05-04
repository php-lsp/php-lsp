<?php

namespace Lsp\Protocol\Type;

/**
 * The parameters of a {@link DocumentOnTypeFormattingRequest}.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class DocumentOnTypeFormattingParams
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(
        public readonly TextDocumentIdentifier $textDocument,
        public readonly Position $position,
        public readonly string $ch,
        public readonly FormattingOptions $options,
    ) {}
}
