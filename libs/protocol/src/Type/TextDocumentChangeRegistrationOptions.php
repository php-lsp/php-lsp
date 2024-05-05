<?php

namespace Lsp\Protocol\Type;

/**
 * Describe options to be used when registered for text document change events.
 *
 * @generated
 */
final class TextDocumentChangeRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;

    /**
     * @generated
     */
    final public function __construct(
        public readonly TextDocumentSyncKind $syncKind,
        array|null $documentSelector,
    ) {
        $this->documentSelector = $documentSelector;
    }
}
