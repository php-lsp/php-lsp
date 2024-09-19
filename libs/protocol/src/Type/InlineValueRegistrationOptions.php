<?php

namespace Lsp\Protocol\Type;

/**
 * Inline value options used during static or dynamic registration.
 *
 * @generated
 * @since 3.17.0
 */
final class InlineValueRegistrationOptions
{
    use StaticRegistrationOptionsMixin;

    use InlineValueOptionsMixin;

    use TextDocumentRegistrationOptionsMixin;

    /**
     * @param list<object|NotebookCellTextDocumentFilter>|null $documentSelector
     */
    final public function __construct(array|null $documentSelector, bool|null $workDoneProgress = null, string|null $id = null)
    {
            $this->workDoneProgress = $workDoneProgress;
    
            $this->documentSelector = $documentSelector;
    
            $this->id = $id;
    }
}