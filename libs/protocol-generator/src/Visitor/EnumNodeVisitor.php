<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Visitor;

use Lsp\Protocol\Generator\Node\Enumeration;
use Lsp\Protocol\Generator\Node\Enumeration\EnumerationEntry;
use Lsp\Protocol\Generator\Node\Enumeration\EnumerationType;
use Lsp\Protocol\Generator\Support\DocCommentBuilder;
use Lsp\Protocol\Generator\Support\Name;
use PhpParser\Comment\Doc;
use PhpParser\Node as NodeInterface;
use PhpParser\Node\Identifier;
use PhpParser\Node\Scalar\Int_ as PhpIntScalar;
use PhpParser\Node\Scalar\String_ as PhpStringScalar;
use PhpParser\Node\Stmt\Enum_ as PhpEnumStatement;
use PhpParser\Node\Stmt\EnumCase as PhpEnumCase;

final class EnumNodeVisitor extends NodeVisitor
{
    public function enterNode(NodeInterface $node): mixed
    {
        if (!$node instanceof Enumeration) {
            return null;
        }

        $this->add($this->createEnum($node));

        return null;
    }

    private function createEnumDocBlock(Enumeration $enum): Doc
    {
        return DocCommentBuilder::build(
            documentation: $enum->documentation,
            tags: [
                'since' => $enum->since,
                'deprecated' => $enum->deprecated,
                'internal' => $enum->proposed === true ? 'This enum is not standardized' : null,
            ],
        );
    }

    private function createEnum(Enumeration $enum): PhpEnumStatement
    {
        $withSuffixes = $this->hasReservedEnumCaseName($enum);

        $statement = new PhpEnumStatement($enum->name);
        $statement->setDocComment($this->createEnumDocBlock($enum));

        $statement->scalarType = new Identifier(match ($enum->type) {
            EnumerationType::INTEGER, EnumerationType::UINTEGER => 'int',
            EnumerationType::STRING => 'string',
        });

        if ($enum->supportsCustomValues === true) {
            $this->addSupportOfCustomValues($enum, $statement);
        }

        $statement->stmts = [];

        foreach ($enum->values as $entry) {
            $statement->stmts[] = $this->createEnumCase($entry, $withSuffixes ? 'Type' : '');
        }

        return $statement;
    }

    private function addSupportOfCustomValues(Enumeration $enum, PhpEnumStatement $stmt): void
    {
        // TODO
    }

    private function hasReservedEnumCaseName(Enumeration $enum): bool
    {
        $names = \array_map(static fn(EnumerationEntry $entry): string
            => $entry->name, $enum->values);

        return Name::containsReserved($names);
    }

    private function createEnumCaseDocBlock(EnumerationEntry $entry): Doc
    {
        return DocCommentBuilder::build(
            documentation: $entry->documentation,
            tags: [
                'since' => $entry->since,
                'deprecated' => $entry->deprecated,
                'internal' => $entry->proposed === true ? 'This case is not standardized' : null,
            ],
        );
    }

    private function createEnumCase(EnumerationEntry $entry, string $suffix = ''): PhpEnumCase
    {
        $statement = new PhpEnumCase(\ucfirst($entry->name) . $suffix);
        $statement->setDocComment($this->createEnumCaseDocBlock($entry));
        $statement->expr = match (true) {
            \is_string($entry->value) => new PhpStringScalar($entry->value),
            \is_int($entry->value) => new PhpIntScalar($entry->value),
        };

        return $statement;
    }
}
