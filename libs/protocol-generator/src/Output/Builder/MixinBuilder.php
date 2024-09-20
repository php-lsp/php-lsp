<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Output\Builder;

use Lsp\Protocol\Generator\IR\Node\IRMixinStatement;
use Lsp\Protocol\Generator\IR\Node\IRPropertyStatement;
use Lsp\Protocol\Generator\IR\Node\IRStatement;
use Lsp\Protocol\Generator\Output\DocBlock\Tag;
use Lsp\Protocol\Generator\Output\DocBlock\TypedTag;
use PhpParser\Modifiers;
use PhpParser\Node\Name;
use PhpParser\Node\PropertyItem;
use PhpParser\Node\Stmt as PhpStatement;
use PhpParser\Node\Stmt\Property as PhpPropertyStatement;
use PhpParser\Node\Stmt\Trait_ as PhpTraitStatement;
use PhpParser\Node\Stmt\Use_ as PhpUseStatement;
use PhpParser\Node\UseItem;

final class MixinBuilder extends Builder
{
    public function build(IRStatement $stmt): ?PhpStatement
    {
        if (!$stmt instanceof IRMixinStatement) {
            return null;
        }

        $trait = $this->createTrait($stmt);

        foreach ($stmt->properties as $property) {
            $trait->stmts[] = $this->createProperty($property);
        }

        return $trait;
    }

    private function createProperty(IRPropertyStatement $stmt): PhpPropertyStatement
    {
        $property = new PhpPropertyStatement(Modifiers::PUBLIC, [
            $item = new PropertyItem($stmt->name),
        ]);

        $item->default = $this->types->resolveDefaultValue(
            type: $property->type = $this->types->build($stmt->type),
        );

        if ($item->default === null) {
            $property->flags |= Modifiers::READONLY;
        }

        $this->addPropertyDocBlock($stmt, $property);

        return $property;
    }

    private function addPropertyDocBlock(IRPropertyStatement $stmt, PhpPropertyStatement $property): void
    {
        $description = $this->docblock->buildDocBlockFromStatement($stmt);

        if ($this->docblock->shouldPrintType($stmt->type)) {
            $description->addTag(new TypedTag('var', $stmt->type));
        }

        foreach ($property->props as $prop) {
            if ($prop->default !== null) {
                $description->addTag(new Tag('readonly'));
            }
        }

        $doc = $this->docblock->buildCommentFromDocBlock($description, 1);

        if ($doc === null) {
            return;
        }

        $property->setDocComment($doc);
    }

    private function createTrait(IRMixinStatement $stmt): PhpTraitStatement
    {
        $trait = new PhpTraitStatement($stmt->name);
        $trait->stmts = [];

        $this->addTraitDocBlock($stmt, $trait);
        $this->addTraitMixins($stmt, $trait);

        return $trait;
    }

    private function addTraitMixins(IRMixinStatement $stmt, PhpTraitStatement $trait): void
    {
        foreach ($stmt->mixins as $mixin) {
            $trait->stmts[] = new PhpUseStatement([
                new UseItem(new Name(
                    name: $mixin->name,
                )),
            ]);
        }
    }

    private function addTraitDocBlock(IRMixinStatement $stmt, PhpTraitStatement $trait): void
    {
        $doc = $this->docblock->buildRootCommentFromStatement($stmt);

        if ($doc === null) {
            return;
        }

        $trait->setDocComment($doc);
    }
}
