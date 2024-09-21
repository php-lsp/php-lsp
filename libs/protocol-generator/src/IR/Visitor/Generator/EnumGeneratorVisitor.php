<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\IR\Visitor\Generator;

use Lsp\Protocol\Generator\IR\Node\IREnumCaseStatement;
use Lsp\Protocol\Generator\IR\Node\IREnumStatement;
use Lsp\Protocol\Generator\IR\Visitor\Analyzer\EnumReservedCaseNamesAnalyzerVisitor;
use Lsp\Protocol\Generator\MetaModel\Node\Enumeration;
use Lsp\Protocol\Generator\MetaModel\Node\Enumeration\MetaEnumerationEntry;
use PhpParser\Node;

final class EnumGeneratorVisitor extends GeneratorVisitor
{
    public function leaveNode(Node $node): mixed
    {
        if (!$node instanceof Enumeration) {
            return null;
        }

        /** @var non-empty-string $suffix */
        $suffix = $node->getAttribute(EnumReservedCaseNamesAnalyzerVisitor::ENUM_RESERVED_NAMES_ATTRIBUTE)
            ?? throw new \InvalidArgumentException('Could not resolve enum case suffix');

        $enum = $this->createEnumStatement($node);

        foreach ($node->values as $value) {
            $enum->cases[] = $this->createEnumCaseStatement($value, $suffix);
        }

        $this->document->add($enum);

        return null;
    }

    private function createEnumCaseStatement(MetaEnumerationEntry $node, string $suffix): IREnumCaseStatement
    {
        $case = new IREnumCaseStatement(
            name: \ucfirst($node->name) . $suffix,
            value: $node->value,
        );

        $case->description = $node->documentation;
        $case->deprecated = $node->deprecated;
        $case->since = $node->since;
        $case->proposed = (bool) $node->proposed;

        return $case;
    }

    private function createEnumStatement(Enumeration $node): IREnumStatement
    {
        $enum = new IREnumStatement(
            name: $node->name,
            type: $this->types->buildNullable($node->type),
        );

        $enum->description = $node->documentation;
        $enum->deprecated = $node->deprecated;
        $enum->since = $node->since;
        $enum->proposed = (bool) $node->proposed;

        return $enum;
    }
}
