<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link CompletionRequest}.
 */
final class CompletionRegistrationOptions
{
    public function __construct(
        /**
         * A document selector to identify the scope of the registration. If set
         * to null the document selector provided on the client side will be
         * used.
         *
         * @var list<(TextDocumentFilterLanguage|TextDocumentFilterScheme|TextDocumentFilterPattern|NotebookCellTextDocumentFilter)>|null
         */
        public readonly ?array $documentSelector = null,
        /**
         * Most tools trigger completion request automatically without
         * explicitly requesting it using a keyboard shortcut (e.g. Ctrl+Space).
         * Typically they do so when the user starts to type an identifier. For
         * example if the user types `c` in a JavaScript file code complete will
         * automatically pop up present `console` besides others as a completion
         * item. Characters that make up identifiers don't need to be listed
         * here.
         *
         * If code complete should automatically be trigger on characters not
         * being valid inside an identifier (for example `.` in JavaScript) list
         * them in `triggerCharacters`.
         *
         * @var list<string>|null
         */
        public readonly ?array $triggerCharacters = null,
        /**
         * The list of all possible characters that commit a completion. This
         * field can be used if clients don't support individual commit
         * characters per completion item. See
         * `ClientCapabilities.textDocument.completion.completionItem.commitCharactersSupport`
         *
         * If a server provides both `allCommitCharacters` and commit characters
         * on an individual completion item the ones on the completion item win.
         *
         * @since 3.2.0
         *
         * @var list<string>|null
         */
        public readonly ?array $allCommitCharacters = null,
        /**
         * The server provides support to resolve additional information for a
         * completion item.
         */
        public readonly ?bool $resolveProvider = null,
        /**
         * The server supports the following `CompletionItem` specific
         * capabilities.
         *
         * @since 3.17.0
         */
        public readonly ?ServerCompletionItemOptions $completionItem = null,
        public readonly ?bool $workDoneProgress = null,
    ) {}
}
