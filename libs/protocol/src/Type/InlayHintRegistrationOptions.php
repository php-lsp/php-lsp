<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Inlay hint options used during static or dynamic registration.
 *
 * @since 3.17.0
 *
 * @generated 2024-11-15
 */
final class InlayHintRegistrationOptions
{
    public function __construct(
        /**
         * The server provides support to resolve additional information for an
         * inlay hint item.
         */
        public readonly ?bool $resolveProvider = null,
        public readonly ?bool $workDoneProgress = null,
        /**
         * A document selector to identify the scope of the registration. If set
         * to null the document selector provided on the client side will be
         * used.
         *
         * @var list<(TextDocumentFilterLanguage|TextDocumentFilterScheme|TextDocumentFilterPattern|NotebookCellTextDocumentFilter)>|null
         */
        public readonly ?array $documentSelector = null,
        /**
         * The id used to register the request. The id can be used to deregister
         * the request again. See also Registration#id.
         */
        public readonly ?string $id = null,
    ) {}
}
