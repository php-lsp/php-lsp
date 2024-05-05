<?php

namespace Lsp\Protocol\Type;

/**
 * The parameters of a {@link DocumentOnTypeFormattingRequest}.
 *
 * @generated
 */
final class DocumentOnTypeFormattingParams
{
    /**
     * @generated
     */
    final public function __construct(
        public readonly TextDocumentIdentifier $textDocument,
        public readonly Position $position,
        public readonly string $ch,
        public readonly FormattingOptions $options,
    ) {}
}
