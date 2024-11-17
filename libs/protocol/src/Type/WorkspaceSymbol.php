<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A special workspace symbol that supports locations without a range.
 *
 * See also SymbolInformation.
 *
 * @since 3.17.0
 */
final class WorkspaceSymbol
{
    public function __construct(
        /**
         * The location of the symbol. Whether a server is allowed to return a
         * location without a range depends on the client capability
         * `workspace.symbol.resolveSupport`.
         *
         * See SymbolInformation#location for more details.
         */
        public readonly Location|LocationUriOnly $location,
        /**
         * The name of this symbol.
         */
        public readonly string $name,
        /**
         * The kind of this symbol.
         */
        public readonly SymbolKind $kind,
        /**
         * A data entry field that is preserved on a workspace symbol between a
         * workspace symbol request and a workspace symbol resolve request.
         */
        public readonly mixed $data = null,
        /**
         * Tags for this symbol.
         *
         * @since 3.16.0
         *
         * @var list<SymbolTag>|null
         */
        public readonly ?array $tags = null,
        /**
         * The name of the symbol containing this symbol. This information is
         * for user interface purposes (e.g. to render a qualifier in the user
         * interface if necessary). It can't be used to re-infer a hierarchy for
         * the document symbols.
         */
        public readonly ?string $containerName = null,
    ) {}
}
