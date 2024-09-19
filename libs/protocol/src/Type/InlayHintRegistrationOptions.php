<?php

namespace Lsp\Protocol\Type;

/**
 * Inlay hint options used during static or dynamic registration.
 *
 * @generated
 * @since 3.17.0
 */
final class InlayHintRegistrationOptions
{
    use StaticRegistrationOptionsMixin;

    use InlayHintOptionsMixin;

    use TextDocumentRegistrationOptionsMixin;

    /**
     * @param list<object|NotebookCellTextDocumentFilter>|null $documentSelector
     */
    final public function __construct(
        array|null $documentSelector,
        bool|null $resolveProvider = null,
        bool|null $workDoneProgress = null,
        string|null $id = null,
    ) {
            $this->resolveProvider = $resolveProvider;
    
            $this->workDoneProgress = $workDoneProgress;
    
            $this->documentSelector = $documentSelector;
    
            $this->id = $id;
    }
}