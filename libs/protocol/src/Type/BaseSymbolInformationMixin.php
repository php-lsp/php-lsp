<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A base for all symbol information.
 *
 * @generated 2024-09-21
 */
trait BaseSymbolInformationMixin
{
    /**
     * The name of this symbol.
     */
    public readonly string $name;
    /**
     * The kind of this symbol.
     */
    public readonly SymbolKind $kind;
    /**
     * Tags for this symbol.
     *
     * @since 3.16.0
     *
     * @var list<SymbolTag>|null
     *
     * @readonly
     */
    public ?array $tags = null;
    /**
     * The name of the symbol containing this symbol. This information is for
     * user interface purposes (e.g. to render a qualifier in the user interface
     * if necessary). It can't be used to re-infer a hierarchy for the document
     * symbols.
     *
     * @readonly
     */
    public ?string $containerName = null;
}
