<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Node\Type;

/**
 * Represents an `and` type (e.g. TextDocumentParams & WorkDoneProgressParams`).
 */
final class AndType implements TypeInterface
{
    /**
     * @param list<TypeInterface> $items
     */
    public function __construct(
        public readonly array $items,
    ) {}
}
