<?php

namespace Lsp\Protocol\Type;

trait CompletionOptionsMixin
{
    use WorkDoneProgressOptionsMixin;

    /**
     * Most tools trigger completion request automatically without explicitly requesting
     * it using a keyboard shortcut (e.g. Ctrl+Space). Typically they do so when the user
     * starts to type an identifier. For example if the user types `c` in a JavaScript file
     * code complete will automatically pop up present `console` besides others as a
     * completion item. Characters that make up identifiers don't need to be listed here.
     *
     * If code complete should automatically be trigger on characters not being valid inside
     * an identifier (for example `.` in JavaScript) list them in `triggerCharacters`.
     *
     * @generated
     * @var list<string>|null
     */
    public array|null $triggerCharacters = null;

    /**
     * The list of all possible characters that commit a completion. This field can be used
     * if clients don't support individual commit characters per completion item. See
     * `ClientCapabilities.textDocument.completion.completionItem.commitCharactersSupport`
     *
     * If a server provides both `allCommitCharacters` and commit characters on an individual
     * completion item the ones on the completion item win.
     *
     * @generated
     * @since 3.2.0
     * @var list<string>|null
     */
    public array|null $allCommitCharacters = null;

    /**
     * The server provides support to resolve additional
     * information for a completion item.
     *
     * @generated
     */
    public bool|null $resolveProvider = null;

    /**
     * The server supports the following `CompletionItem` specific
     * capabilities.
     *
     * @generated
     * @since 3.17.0
     */
    public CompletionOptionsCompletionItem|null $completionItem = null;
}