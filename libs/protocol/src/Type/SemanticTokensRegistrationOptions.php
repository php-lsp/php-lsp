<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @since 3.16.0
 *
 * @generated 2024-11-15
 */
final class SemanticTokensRegistrationOptions
{
    public function __construct(
        /**
         * The legend used by the server.
         */
        public readonly SemanticTokensLegend $legend,
        /**
         * A document selector to identify the scope of the registration. If set
         * to null the document selector provided on the client side will be
         * used.
         *
         * @var list<(TextDocumentFilterLanguage|TextDocumentFilterScheme|TextDocumentFilterPattern|NotebookCellTextDocumentFilter)>|null
         */
        public readonly ?array $documentSelector = null,
        /**
         * Server supports providing semantic tokens for a specific range of a
         * document.
         */
        public readonly bool|SemanticTokensOptionsRange|null $range = null,
        /**
         * Server supports providing semantic tokens for a full document.
         */
        public readonly bool|SemanticTokensFullDelta|null $full = null,
        public readonly ?bool $workDoneProgress = null,
        /**
         * The id used to register the request. The id can be used to deregister
         * the request again. See also Registration#id.
         */
        public readonly ?string $id = null,
    ) {}
}
