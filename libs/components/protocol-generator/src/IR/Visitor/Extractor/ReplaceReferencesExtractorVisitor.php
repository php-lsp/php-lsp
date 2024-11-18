<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\IR\Visitor\Extractor;

use Lsp\Protocol\Generator\MetaModel\Node\MetaProperty;
use Lsp\Protocol\Generator\MetaModel\Node\Type\MetaReferenceType;
use Lsp\Protocol\Generator\MetaModel\Node\Type\MetaType;
use PhpParser\Node;

final class ReplaceReferencesExtractorVisitor extends ExtractorVisitor
{
    private ?MetaProperty $property = null;

    public function enterNode(Node $node): ?MetaType
    {
        if ($node instanceof MetaProperty) {
            $this->property = $node;

            return null;
        }

        // Skip non-references or references inside non-property contexts
        if (!$node instanceof MetaReferenceType
            || $this->property === null
            || $node->name === 'LSPAny') {
            return null;
        }

        $reference = $this->model->findReferenceFromAliases($node);

        if ($reference instanceof MetaType) {
            return $reference;
        }

        return null;
    }

    public function leaveNode(Node $node): mixed
    {
        if ($node instanceof MetaProperty) {
            $this->property = null;
        }

        return null;
    }
}
