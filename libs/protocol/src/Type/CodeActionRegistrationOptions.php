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
     * @param list<(TextDocumentFilterLanguage|TextDocumentFilterScheme|TextDocumentFilterPattern|NotebookCellTextDocumentFilter)>|null $documentSelector
     *        A document selector to identify the scope of the registration. If set to
     *        null the document selector provided on the client side will be used.
     * @param list<CodeActionKind>|null $codeActionKinds CodeActionKinds that
     *        this server may return.
     *
     *        The list of kinds may be generic, such as `CodeActionKind.Refactor`, or
     *        the server may list out every specific kind they provide.
     * @param list<CodeActionKindDocumentation>|null $documentation Static
     *        documentation for a class of code actions.
     *
     *        Documentation from the provider should be shown in the code actions menu
     *        if either:
     *
     *        - Code actions of `kind` are requested by the editor. In this case, the
     *        editor will show the documentation that
     *          most closely matches the requested code action kind. For example, if a
     *        provider has documentation for
     *          both `Refactor` and `RefactorExtract`, when the user requests code
     *        actions for `RefactorExtract`,
     *          the editor will use the documentation for `RefactorExtract` instead of
     *        the documentation for `Refactor`.
     *
     *        - Any code actions of `kind` are returned by the provider.
     *
     *        At most one documentation entry should be shown per provider.
     * @param bool|null $resolveProvider the server provides support to resolve
     *        additional information for a code action
     */
    public function __construct(
        ?array $documentSelector = null,
        ?array $codeActionKinds = null,
        ?array $documentation = null,
        ?bool $resolveProvider = null,
        ?bool $workDoneProgress = null,
    ) {
        $this->documentSelector = $documentSelector;
        $this->codeActionKinds = $codeActionKinds;
        $this->documentation = $documentation;
        $this->resolveProvider = $resolveProvider;
        $this->workDoneProgress = $workDoneProgress;
    }
}
