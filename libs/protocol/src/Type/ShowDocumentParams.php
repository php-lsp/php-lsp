<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Params to show a resource in the UI.
 *
 * @since 3.16.0
 *
 * @generated 2024-11-15
 */
final class ShowDocumentParams
{
    public function __construct(
        /**
         * The uri to show.
         *
         * @var non-empty-string
         */
        public readonly string $uri,
        /**
         * Indicates to show the resource in an external program.
         * To show, for example, `https://code.visualstudio.com/` in the default
         * WEB browser set `external` to `true`.
         */
        public readonly ?bool $external = null,
        /**
         * An optional property to indicate whether the editor showing the
         * document should take focus or not.
         * Clients might ignore this property if an external program is started.
         */
        public readonly ?bool $takeFocus = null,
        /**
         * An optional selection range if the document is a text document.
         * Clients might ignore the property if an external program is started
         * or the file is not a text file.
         */
        public readonly ?Range $selection = null,
    ) {}
}
