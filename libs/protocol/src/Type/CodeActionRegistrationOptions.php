<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link CodeActionRequest}.
 *
 * @generated 2024-11-14
 */
final class CodeActionRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;
    use CodeActionOptionsMixin;

    /**
     * @param list<(TextDocumentRegistrationOptionsDocumentSelector|NotebookCellTextDocumentFilter)>|null $documentSelector
     *        A document selector to identify the scope of the registration. If set to
     *        null the document selector provided on the client side will be used.
     * @param list<CodeActionKind>|null $codeActionKinds CodeActionKinds that
     *        this server may return.
     *
     *        The list of kinds may be generic, such as `CodeActionKind.Refactor`, or
     *        the server may list out every specific kind they provide.
     * @param bool|null $resolveProvider the server provides support to resolve
     *        additional information for a code action
     */
    public function __construct(
        ?array $documentSelector = null,
        ?array $codeActionKinds = null,
        ?bool $resolveProvider = null,
        ?bool $workDoneProgress = null,
    ) {
        $this->documentSelector = $documentSelector;
        $this->codeActionKinds = $codeActionKinds;
        $this->resolveProvider = $resolveProvider;
        $this->workDoneProgress = $workDoneProgress;
    }
}
