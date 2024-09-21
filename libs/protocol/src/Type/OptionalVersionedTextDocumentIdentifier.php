<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A text document identifier to optionally denote a specific version of a text
 * document.
 *
 * @generated 2024-09-21
 */
final class OptionalVersionedTextDocumentIdentifier
{
    use TextDocumentIdentifierMixin;

    /**
     * @param non-empty-string $uri the text document's uri
     */
    public function __construct(
        string $uri,
        /**
         * The version number of this document. If a versioned text document
         * identifier is sent from the server to the client and the file is not
         * open in the editor
         * (the server has not received an open notification before) the server
         * can send `null` to indicate that the version is unknown and the
         * content on disk is the truth (as specified with document content
         * ownership).
         *
         * @var int<-2147483648, 2147483647>|null
         */
        public readonly ?int $version = null,
    ) {
        $this->uri = $uri;
    }
}
