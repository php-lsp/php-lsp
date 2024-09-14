<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Output\Visitor;

use Lsp\Protocol\Generator\MetaModel\Node\Enumeration;
use Lsp\Protocol\Generator\MetaModel\Node\Enumeration\EnumerationEntry;
use Lsp\Protocol\Generator\MetaModel\Node\Enumeration\EnumerationType;
use Lsp\Protocol\Generator\Output\DocBlock\DefinitionBuilder;
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

    private function createEnum(Enumeration $enum): PhpEnumStatement
    {
        $withSuffixes = $this->hasReservedEnumCaseName($enum);

        $statement = new PhpEnumStatement($enum->name);

        DefinitionBuilder::makeIfNotEmpty($enum, $statement->setDocComment(...));

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

        return self::containsReservedName($names);
    }

    private function createEnumCase(EnumerationEntry $entry, string $suffix = ''): PhpEnumCase
    {
        $statement = new PhpEnumCase(\ucfirst($entry->name) . $suffix);
        DefinitionBuilder::makeIfNotEmpty($entry, $statement->setDocComment(...));

        $statement->expr = match (true) {
            \is_string($entry->value) => new PhpStringScalar($entry->value),
            \is_int($entry->value) => new PhpIntScalar($entry->value),
        };

        return $statement;
    }

    private static function isReservedName(string $name): bool
    {
        return \in_array(\strtolower($name), [
            'namespace',
            'class',
            'enum',
            'interface',
            'function',
            'exit',
        ], true);
    }

    /**
     * @param array<array-key, string> $names
     */
    private static function containsReservedName(array $names): bool
    {
        foreach ($names as $name) {
            if (self::isReservedName($name)) {
                return true;
            }
        }

        return false;
    }
}
