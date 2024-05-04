<?php

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link CodeActionRequest}.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class CodeActionRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;

    use CodeActionOptionsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(
        array|null $documentSelector,
        array $codeActionKinds,
        bool $resolveProvider,
        bool $workDoneProgress,
    ) {
        $this->documentSelector = $documentSelector;

        $this->codeActionKinds = $codeActionKinds;

        $this->resolveProvider = $resolveProvider;

        $this->workDoneProgress = $workDoneProgress;
    }
}
