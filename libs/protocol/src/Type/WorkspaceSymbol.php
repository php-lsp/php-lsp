<?php

namespace Lsp\Protocol\Type;

/**
 * A special workspace symbol that supports locations without a range.
 *
 * See also SymbolInformation.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.17.0
 */
final class WorkspaceSymbol
{
    use BaseSymbolInformationMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.17.0
     */
    final public function __construct(
        public readonly Location|object $location,
        public readonly mixed $data,
        string $name,
        SymbolKind $kind,
        array $tags,
        string $containerName,
    ) {
        $this->name = $name;

        $this->kind = $kind;

        $this->tags = $tags;

        $this->containerName = $containerName;
    }
}
