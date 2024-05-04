<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\DocBlock;

use Lsp\Protocol\Generator\Node\Definition;
use PhpParser\Comment\Doc as PhpDocBlock;

final class DefinitionBuilder
{
    private const MESSAGE_FOR_UPCOMING_SPEC
        = 'Describes the upcoming version of the '
        . 'Language Server Protocol and is under development';

    private readonly Builder $builder;

    public function __construct()
    {
        $this->builder = new Builder();
    }

    public static function makeIfNotEmpty(Definition $definition, callable $then): void
    {
        $docblock = (new self())->buildIfNotEmpty($definition);

        if ($docblock !== null) {
            $then($docblock);
        }
    }

    /**
     * @return array<non-empty-string, mixed>
     */
    public static function getDefinitionTags(Definition $definition): array
    {
        return [
            'generated' => (new \DateTime())->format(\DateTimeInterface::ATOM),
            'since' => $definition->since,
            'deprecated' => $definition->deprecated,
            'internal' => $definition->proposed === true
                ? self::MESSAGE_FOR_UPCOMING_SPEC
                : null,
        ];
    }

    public function buildIfNotEmpty(Definition $definition): ?PhpDocBlock
    {
        return $this->builder->buildIfNotEmpty(
            documentation: $definition->documentation,
            tags: self::getDefinitionTags($definition),
        );
    }
}
