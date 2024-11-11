<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\IR\Visitor\Analyzer;

use Lsp\Protocol\Generator\MetaModel\Node\MetaStructure;
use Lsp\Protocol\Generator\MetaModel\Node\Type\MetaReferenceType;
use PhpParser\Node;

final class MixinsAnalyzerVisitor extends AnalyzerVisitor
{
    public const STRUCT_MIXIN_ATTRIBUTE = 'used_as_mixin';

    public static function isMixin(MetaStructure $node): bool
    {
        return (bool) $node->getAttribute(
            key: self::STRUCT_MIXIN_ATTRIBUTE,
            default: false,
        );
    }

    public function enterNode(Node $node): mixed
    {
        if (!$node instanceof MetaStructure) {
            return null;
        }

        $this->markParentsAsMixin($node);

        return null;
    }

    private function markParentsAsMixin(MetaStructure $structure): void
    {
        foreach ($structure->extends as $parent) {
            // TODO: Temporarily mark parents as mixins to simplify generation
            //       logic. Should be replaced by (abstract) class in future
            //       if class is inherited only once.
            $this->resolveReferenceAndMarkParentsAsMixin($parent);
        }

        foreach ($structure->mixins as $mixin) {
            $this->resolveReferenceAndMarkParentsAsMixin($mixin);
        }
    }

    private function resolveReferenceAndMarkParentsAsMixin(MetaReferenceType $reference): void
    {
        $structure = $this->model->findReference($reference);

        // We mark all parent structures cyclically if there is no mark.
        if (!$structure instanceof MetaStructure || $structure->hasAttribute(self::STRUCT_MIXIN_ATTRIBUTE)) {
            return;
        }

        $structure->setAttribute(self::STRUCT_MIXIN_ATTRIBUTE, true);

        $this->markParentsAsMixin($structure);
    }
}
