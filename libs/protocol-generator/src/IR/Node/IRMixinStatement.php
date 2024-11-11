<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\IR\Node;

final class IRMixinStatement extends IRClassLikeStatement
{
    /**
     * @var list<IRMixinStatement>
     */
    public array $mixins = [];

    /**
     * @var list<IRPropertyStatement>
     */
    public array $properties = [];

    /**
     *@api
     *
     * @return iterable<IRMixinStatement, IRPropertyStatement>
     */
    public function getAllProperties(): iterable
    {
        foreach ($this->properties as $property) {
            yield $this => $property;
        }

        foreach ($this->mixins as $mixin) {
            yield from $mixin->getAllProperties();
        }
    }

    public function getSubNodeNames(): array
    {
        return ['mixins', 'properties'];
    }
}
