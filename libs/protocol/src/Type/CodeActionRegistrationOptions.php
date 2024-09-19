<?php

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link CodeActionRequest}.
 *
 * @generated
 */
final class CodeActionRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;

    use CodeActionOptionsMixin;

    /**
     * @param list<object|NotebookCellTextDocumentFilter>|null $documentSelector
     * @param list<CodeActionKind>|null $codeActionKinds
     */
    final public function __construct(
        array|null $documentSelector,
        array|null $codeActionKinds = null,
        bool|null $resolveProvider = null,
        bool|null $workDoneProgress = null,
    ) {
            $this->documentSelector = $documentSelector;
    
            $this->codeActionKinds = $codeActionKinds;
    
            $this->resolveProvider = $resolveProvider;
    
            $this->workDoneProgress = $workDoneProgress;
    }
}