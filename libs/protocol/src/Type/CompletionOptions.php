<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Completion options.
 *
 * @generated 2024-09-21
 */
final class CompletionOptions
{
    use CompletionOptionsMixin;

    /**
     * @param list<string>|null $triggerCharacters Most tools trigger completion
     *        request automatically without explicitly requesting it using a keyboard
     *        shortcut (e.g. Ctrl+Space). Typically they do so when the user starts to
     *        type an identifier. For example if the user types `c` in a JavaScript
     *        file code complete will automatically pop up present `console` besides
     *        others as a completion item. Characters that make up identifiers don't
     *        need to be listed here.
     *
     *        If code complete should automatically be trigger on characters not being
     *        valid inside an identifier (for example `.` in JavaScript) list them in
     *        `triggerCharacters`.
     * @param list<string>|null $allCommitCharacters The list of all possible
     *        characters that commit a completion. This field can be used if clients
     *        don't support individual commit characters per completion item. See
     *        `ClientCapabilities.textDocument.completion.completionItem.commitCharactersSupport`
     *
     *        If a server provides both `allCommitCharacters` and commit characters on
     *        an individual completion item the ones on the completion item win.
     * @param bool|null $resolveProvider the server provides support to resolve
     *        additional information for a completion item
     * @param CompletionOptionsCompletionItem|null $completionItem the server
     *        supports the following `CompletionItem` specific capabilities
     */
    public function __construct(
        ?array $triggerCharacters = null,
        ?array $allCommitCharacters = null,
        ?bool $resolveProvider = null,
        ?CompletionOptionsCompletionItem $completionItem = null,
        ?bool $workDoneProgress = null,
    ) {
        $this->triggerCharacters = $triggerCharacters;
        $this->allCommitCharacters = $allCommitCharacters;
        $this->resolveProvider = $resolveProvider;
        $this->completionItem = $completionItem;
        $this->workDoneProgress = $workDoneProgress;
    }
}
