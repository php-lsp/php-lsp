<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\MetaModel\Node\Type;

/**
 * Represents an array type (e.g. `TextDocument[]`).
 */
final class MetaArrayType extends MetaType
{
    public function __construct(
        public MetaTypeInterface $element,
    ) {
        parent::__construct();
    }

    public function getSubNodeNames(): array
    {
        return ['element'];
    }

    public static function fromArray(array $data): self
    {
        // @phpstan-ignore-next-line
        return new self(MetaType::fromArray($data['element']));
    }
}
