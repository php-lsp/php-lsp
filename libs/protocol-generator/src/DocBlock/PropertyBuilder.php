<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\DocBlock;

use Lsp\Protocol\Generator\Node\MetaModel;
use Lsp\Protocol\Generator\Node\Property;
use Lsp\Protocol\Generator\Transformer\Lsp2TlTransformer;
use PhpParser\Comment\Doc as PhpDocBlock;
use TypeLang\Parser\Node\Stmt\TypeStatement;
use TypeLang\Printer\NativeTypePrinter;
use TypeLang\Printer\PrettyPrinter;
use TypeLang\Printer\PrinterInterface;

final class PropertyBuilder
{
    private readonly Builder $builder;

    private readonly PrinterInterface $native;

    private readonly PrinterInterface $pretty;

    private readonly Lsp2TlTransformer $lsp2tl;

    public function __construct(MetaModel $ctx)
    {
        $this->builder = new Builder();
        $this->native = new NativeTypePrinter();
        $this->pretty = new PrettyPrinter();
        $this->lsp2tl = new Lsp2TlTransformer($ctx);
    }

    private function getVarTag(TypeStatement $type): ?string
    {
        $native = $this->native->print($type);
        $pretty = $this->pretty->print($type);

        if ($native === $pretty) {
            return null;
        }

        return $pretty;
    }

    public static function makeIfNotEmpty(MetaModel $ctx, Property $property, callable $then): void
    {
        $docblock = (new self($ctx))->buildIfNotEmpty($property);

        if ($docblock !== null) {
            $then($docblock);
        }
    }

    public function buildIfNotEmpty(Property $property): ?PhpDocBlock
    {
        return $this->builder->buildIfNotEmpty(
            documentation: $property->documentation,
            tags: [
                ...DefinitionBuilder::getDefinitionTags($property),
                'var' => $this->getVarTag(
                    type: $this->lsp2tl->transform($property->type),
                ),
            ],
        );
    }
}
