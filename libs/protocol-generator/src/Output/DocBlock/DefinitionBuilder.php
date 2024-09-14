<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Output\DocBlock;

use Lsp\Protocol\Generator\MetaModel\Node\Definition;
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
        $tags = [
            'generated' => true,
            'since' => $definition->since,
            'deprecated' => $definition->deprecated,
            'internal' => $definition->proposed === true
                ? self::MESSAGE_FOR_UPCOMING_SPEC
                : null,
        ];

        if (($internal = $definition->getAttribute('internal')) !== null) {
            $message = 'This class is an internal dependency of {@see %s}';
            // @phpstan-ignore-next-line
            $tags['internal'] = \sprintf($message, (string) $internal);
        }

        return $tags;
    }

    public function buildIfNotEmpty(Definition $definition): ?PhpDocBlock
    {
        return $this->builder->buildIfNotEmpty(
            documentation: $definition->documentation,
            tags: self::getDefinitionTags($definition),
        );
    }
}
