<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link SignatureHelpRequest}.
 *
 * @generated 2024-11-15
 */
final class SignatureHelpRegistrationOptions
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
         * List of characters that trigger signature help automatically.
         *
         * @var list<string>|null
         */
        public readonly ?array $triggerCharacters = null,
        /**
         * List of characters that re-trigger signature help.
         *
         * These trigger characters are only active when signature help is
         * already showing. All trigger characters are also counted as
         * re-trigger characters.
         *
         * @since 3.15.0
         *
         * @var list<string>|null
         */
        public readonly ?array $retriggerCharacters = null,
        public readonly ?bool $workDoneProgress = null,
    ) {}
}
