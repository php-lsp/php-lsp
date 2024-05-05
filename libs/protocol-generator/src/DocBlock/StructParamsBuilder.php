<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\DocBlock;

use Lsp\Protocol\Generator\Node\MetaModel;
use Lsp\Protocol\Generator\Node\Structure;
use Lsp\Protocol\Generator\Transformer\Lsp2TlTransformer;
use PhpParser\Comment\Doc as PhpDocBlock;
use TypeLang\Parser\Node\Stmt\TypeStatement;
use TypeLang\Printer\NativeTypePrinter;
use TypeLang\Printer\PrettyPrinter;
use TypeLang\Printer\PrinterInterface;

final class StructParamsBuilder
{
    private readonly Builder $builder;

    private readonly PrinterInterface $native;

    private readonly PrinterInterface $pretty;

    private readonly Lsp2TlTransformer $lsp2tl;

    public function __construct(
        private readonly MetaModel $ctx,
    ) {
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

    public static function makeIfNotEmpty(MetaModel $ctx, Structure $struct, callable $then): void
    {
        $docblock = (new self($ctx))->buildIfNotEmpty($struct);

        if ($docblock !== null) {
            $then($docblock);
        }
    }

    public function buildIfNotEmpty(Structure $struct): ?PhpDocBlock
    {
        $provider = (function () use ($struct) {
            yield from DefinitionBuilder::getDefinitionTags($struct);

            $defined = [];

            foreach ($struct->getProperties($this->ctx) as $property) {
                $type = $this->getVarTag($this->lsp2tl->transform($property->type));

                if ($type === null || \in_array($property->name, $defined, true)) {
                    continue;
                }

                $defined[] = $property->name;

                yield 'param' => \trim(\vsprintf('%s $%s', [
                    $type,
                    $property->name,
                ]));
            }
        })->call($this);

        return $this->builder->buildIfNotEmpty(
            documentation: null,
            tags: $provider,
        );
    }
}
