<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Node\Type;

use Lsp\Protocol\Generator\Node\Definition;
use Lsp\Protocol\Generator\Node\MetaModel;

/**
 * Represents a reference to another type (e.g. `TextDocument`). This is either
 * a `Structure`, a `Enumeration` or a `TypeAlias` in the same meta model.
 */
final class ReferenceType extends Type implements KeyTypeInterface
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
