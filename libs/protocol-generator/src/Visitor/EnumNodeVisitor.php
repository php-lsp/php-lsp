<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Visitor;

use Lsp\Protocol\Generator\Node\Enumeration;
use Lsp\Protocol\Generator\Node\Enumeration\EnumerationEntry;
use Lsp\Protocol\Generator\Support\DocCommentBuilder;
use Lsp\Protocol\Generator\Support\Name;
use PhpParser\Node;
use PhpParser\Node\Scalar\String_ as PhpStringScalar;
use PhpParser\Node\Scalar\Int_ as PhpIntScalar;
use PhpParser\Node\Stmt\Enum_ as PhpEnumStatement;
use PhpParser\Node\Stmt\EnumCase as PhpEnumCase;

final class EnumNodeVisitor extends NodeVisitor
{
    public function enterNode(Node $node)
    {
        if (!$node instanceof Enumeration) {
            return null;
        }

        $this->add($this->createPhpEnumStatement($node));

        return null;
    }

    private function createPhpEnumStatement(Enumeration $enum): PhpEnumStatement
    {
        $statement = new PhpEnumStatement($enum->name);

        $statement->setDocComment(DocCommentBuilder::build(
            documentation: $enum->documentation,
            tags: [
                'since' => $enum->since,
                'deprecated' => $enum->deprecated,
                'internal' => $enum->proposed === true ? 'This enum is not standardized' : null,
            ],
        ));

        $statement->scalarType = new Node\Identifier(match ($enum->type) {
            Enumeration\EnumerationType::INTEGER,
            Enumeration\EnumerationType::UINTEGER => 'int',
            Enumeration\EnumerationType::STRING => 'string',
        });

        if ($enum->supportsCustomValues === true) {
            $this->addSupportOfCustomValues($enum, $statement);
        }

        $hasReservedEnumCaseName = $this->hasReservedEnumCaseName($enum);

        $statement->stmts = [];
        foreach ($enum->values as $entry) {
            $statement->stmts[] = $this->createPhpEnumCase($entry, $hasReservedEnumCaseName);
        }

        return $statement;
    }

    private function hasReservedEnumCaseName(Enumeration $enum): bool
    {
        $names = \array_map(static function (EnumerationEntry $entry): string {
            return $entry->name;
        }, $enum->values);

        return Name::containsReserved($names);
    }

    private function addSupportOfCustomValues(Enumeration $enum, PhpEnumStatement $stmt): void
    {
        // TODO
    }

    private function createPhpEnumCase(EnumerationEntry $entry, bool $hasReservedEnumCaseName): PhpEnumCase
    {
        $name = \ucfirst($entry->name);

        if ($hasReservedEnumCaseName) {
            $name .= 'Type';
        }

        $statement = new PhpEnumCase($name);

        $statement->setDocComment(DocCommentBuilder::build(
            documentation: $entry->documentation,
            tags: [
                'since' => $entry->since,
                'deprecated' => $entry->deprecated,
                'internal' => $entry->proposed === true ? 'This case is not standardized' : null,
            ],
        ));

        $statement->expr = match (true) {
            \is_string($entry->value) => new PhpStringScalar($entry->value),
            \is_int($entry->value) => new PhpIntScalar($entry->value),
        };

        return $statement;
    }
}
