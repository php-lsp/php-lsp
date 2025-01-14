<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\MetaModel\Node\Type;

/**
 * Represents an `and` type (e.g. TextDocumentParams & WorkDoneProgressParams`).
 */
final class MetaAndType extends MetaType
{
    /**
     * @param non-empty-list<MetaTypeInterface> $items
     */
    public function __construct(
        public array $items,
    ) {
        parent::__construct();
    }

    public function getSubNodeNames(): array
    {
        return ['items'];
    }

    public static function fromArray(array $data): self
    {
        /** @var non-empty-list<MetaTypeInterface> $types */
        // @phpstan-ignore-next-line
        $types = \array_map(MetaType::fromArray(...), $data['items'] ?? []);

        return new self($types);
    }
}