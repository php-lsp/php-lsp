<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\MetaModel\Node\Type;

use Lsp\Protocol\Generator\MetaModel\Node\Definition;
use Lsp\Protocol\Generator\MetaModel\Node\MetaModel;

/**
 * Represents a reference to another type (e.g. `TextDocument`). This is either
 * a `Structure`, a `Enumeration` or a `TypeAlias` in the same meta model.
 */
final class MetaReferenceType extends MetaType implements MetaKeyTypeInterface
{
    /**
     * @param non-empty-string $name
     */
    public function __construct(
        public string $name,
    ) {
        parent::__construct();
    }

    public function lookup(MetaModel $ctx): ?Definition
    {
        return $ctx->findReference($this);
    }

    public static function fromArray(array $data): self
    {
        // @phpstan-ignore-next-line
        return new self($data['name']);
    }
}
