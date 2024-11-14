<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The parameters sent in a save text document notification.
 *
 * @generated 2024-11-14
 */
final class DidSaveTextDocumentParams
{
    public function __construct(
        /**
         * The document that was saved.
         */
        public readonly TextDocumentIdentifier $textDocument,
        /**
         * Optional the content when saved. Depends on the includeText value
         * when the save notification was requested.
         */
        public readonly ?string $text = null,
    ) {}
}
