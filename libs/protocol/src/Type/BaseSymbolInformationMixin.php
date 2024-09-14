<?php

namespace Lsp\Protocol\Type;

trait BaseSymbolInformationMixin
{
    /**
     * The name of this symbol.
     *
     * @generated
     */
    public readonly string $name;

    /**
     * The kind of this symbol.
     *
     * @generated
     */
    public readonly SymbolKind $kind;

    /**
     * Tags for this symbol.
     *
     * @generated
     *
     * @since 3.16.0
     *
     * @var list<SymbolTag>
     */
    public readonly array $tags;

    /**
     * The name of the symbol containing this symbol. This information is for
     * user interface purposes (e.g. to render a qualifier in the user interface
     * if necessary). It can't be used to re-infer a hierarchy for the document
     * symbols.
     *
     * @generated
     */
    public readonly string $containerName;
}
