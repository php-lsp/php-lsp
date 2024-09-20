<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\IR\Visitor\Service;

use Lsp\Protocol\Generator\MetaModel\Node\Enumeration\MetaEnumerationType;
use Lsp\Protocol\Generator\MetaModel\Node\MetaModel;
use Lsp\Protocol\Generator\MetaModel\Node\Type\MetaAndType;
use Lsp\Protocol\Generator\MetaModel\Node\Type\MetaArrayType;
use Lsp\Protocol\Generator\MetaModel\Node\Type\MetaBaseType;
use Lsp\Protocol\Generator\MetaModel\Node\Type\MetaBooleanLiteralType;
use Lsp\Protocol\Generator\MetaModel\Node\Type\MetaIntegerLiteralType;
use Lsp\Protocol\Generator\MetaModel\Node\Type\MetaMapType;
use Lsp\Protocol\Generator\MetaModel\Node\Type\MetaOrType;
use Lsp\Protocol\Generator\MetaModel\Node\Type\MetaReferenceType;
use Lsp\Protocol\Generator\MetaModel\Node\Type\MetaStringLiteralType;
use Lsp\Protocol\Generator\MetaModel\Node\Type\MetaStructureLiteralType;
use Lsp\Protocol\Generator\MetaModel\Node\Type\MetaTupleType;
use Lsp\Protocol\Generator\MetaModel\Node\Type\MetaTypeInterface;
use TypeLang\Parser\Node\Literal\BoolLiteralNode;
use TypeLang\Parser\Node\Literal\IntLiteralNode;
use TypeLang\Parser\Node\Literal\NullLiteralNode;
use TypeLang\Parser\Node\Literal\StringLiteralNode;
use TypeLang\Parser\Node\Stmt\IntersectionTypeNode;
use TypeLang\Parser\Node\Stmt\NamedTypeNode;
use TypeLang\Parser\Node\Stmt\Shape\FieldsListNode;
use TypeLang\Parser\Node\Stmt\Shape\ImplicitFieldNode;
use TypeLang\Parser\Node\Stmt\Template\ArgumentNode;
use TypeLang\Parser\Node\Stmt\Template\ArgumentsListNode;
use TypeLang\Parser\Node\Stmt\TypeStatement;
use TypeLang\Parser\Node\Stmt\UnionTypeNode;

final class TypeBuilder
{
    public const INT32_MAX_VALUE = 2147483647;
    public const INT32_MIN_VALUE = -2147483647 - 1;

    public function __construct(
        private readonly MetaModel $ctx,
    ) {}

    public function int32Max(): IntLiteralNode
    {
        return $this->intOf(self::INT32_MAX_VALUE);
    }

    public function int32Min(): IntLiteralNode
    {
        return $this->intOf(self::INT32_MIN_VALUE);
    }

    /**
     * Defines an integer number in the range of -2^31 to 2^31 - 1.
     *
     * @link https://microsoft.github.io/language-server-protocol/specifications/lsp/3.17/specification/#baseTypes
     */
    public function int(): NamedTypeNode
    {
        return new NamedTypeNode(
            name: 'int',
            arguments: new ArgumentsListNode([
                new ArgumentNode($this->int32Min()),
                new ArgumentNode($this->int32Max()),
            ]),
        );
    }

    public function intOf(int $value): IntLiteralNode
    {
        return new IntLiteralNode($value);
    }

    /**
     * Defines an unsigned integer number in the range of 0 to 2^31 - 1.
     *
     * @link https://microsoft.github.io/language-server-protocol/specifications/lsp/3.17/specification/#baseTypes
     */
    public function uint(): NamedTypeNode
    {
        return new NamedTypeNode(
            name: 'int',
            arguments: new ArgumentsListNode([
                new ArgumentNode(new IntLiteralNode(0)),
                new ArgumentNode($this->int32Max()),
            ]),
        );
    }

    public function string(): NamedTypeNode
    {
        return new NamedTypeNode('string');
    }

    public function stringOf(string $value): StringLiteralNode
    {
        return new StringLiteralNode($value);
    }

    public function bool(): NamedTypeNode
    {
        return new NamedTypeNode('bool');
    }

    public function boolOf(bool $value): BoolLiteralNode
    {
        return new BoolLiteralNode($value);
    }

    public function null(): NullLiteralNode
    {
        return new NullLiteralNode();
    }

    public function any(): NamedTypeNode
    {
        return new NamedTypeNode('mixed');
    }

    /**
     * Defines a decimal number. Since decimal numbers are very
     * rare in the language server specification we denote the
     * exact range with every decimal using the mathematics
     * interval notation (e.g. [0, 1] denotes all decimals d with
     * 0 <= d <= 1.
     *
     * @return UnionTypeNode<NamedTypeNode>
     */
    public function decimal(): UnionTypeNode
    {
        /** @var UnionTypeNode<NamedTypeNode> */
        return new UnionTypeNode(
            a: new NamedTypeNode('float'),
            b: new NamedTypeNode(
                name: 'int',
                arguments: new ArgumentsListNode([
                    new ArgumentNode($this->intOf(0)),
                    new ArgumentNode($this->intOf(1)),
                ]),
            ),
        );
    }

    /**
     * LSP arrays.
     *
     * @link https://microsoft.github.io/language-server-protocol/specifications/lsp/3.17/specification/#baseTypes
     */
    public function arrayOf(TypeStatement $type): TypeStatement
    {
        return new NamedTypeNode(
            name: 'list',
            arguments: new ArgumentsListNode([
                new ArgumentNode($type),
            ]),
        );
    }

    /**
     * LSP arrays.
     *
     * @link https://microsoft.github.io/language-server-protocol/specifications/lsp/3.17/specification/#baseTypes
     */
    public function mapOf(TypeStatement $key, TypeStatement $value): TypeStatement
    {
        return new NamedTypeNode(
            name: 'list',
            arguments: new ArgumentsListNode([
                new ArgumentNode($key),
                new ArgumentNode($value),
            ]),
        );
    }

    /**
     * @param iterable<array-key, TypeStatement> $types
     */
    public function tupleOf(iterable $types): TypeStatement
    {
        $fields = [];

        foreach ($types as $type) {
            $fields[] = new ImplicitFieldNode($type);
        }

        return new NamedTypeNode(
            name: 'array',
            fields: new FieldsListNode($fields, true),
        );
    }

    /**
     * @param iterable<array-key, TypeStatement> $types
     */
    public function unionOf(iterable $types): TypeStatement
    {
        $types = [...$this->filter($types)];

        return match (\count($types)) {
            0 => throw new \OutOfRangeException('Could not create empty union type'),
            1 => \reset($types),
            default => new UnionTypeNode(...$types),
        };
    }

    /**
     * @param iterable<array-key, TypeStatement> $types
     */
    public function intersectionOf(iterable $types): TypeStatement
    {
        $types = [...$this->filter($types)];

        return match (\count($types)) {
            0 => throw new \OutOfRangeException('Could not create empty intersection type'),
            1 => \reset($types),
            default => new IntersectionTypeNode(...$types),
        };
    }

    /**
     * @param iterable<array-key, TypeStatement> $types
     *
     * @return iterable<array-key, TypeStatement>
     */
    private function filter(iterable $types): iterable
    {
        $types = [...$types];

        // Replace "mixed|T" to "mixed"
        if ($this->containsMixed($types)) {
            return [new NamedTypeNode('mixed')];
        }

        // Convert "null<T>" to "null"
        foreach ($types as $i => $type) {
            if ($type instanceof NamedTypeNode && $type->name->toLowerString() === 'null') {
                $types[$i] = new NullLiteralNode();
            }
        }

        // Filter unique types
        $result = [];

        foreach ($types as $type) {
            if ($type instanceof NamedTypeNode) {
                $result[$type->name->toLowerString()] = $type;
            } elseif ($type instanceof NullLiteralNode) {
                $result['null'] = $type;
            } else {
                $result[] = $type;
            }
        }

        return \array_values($result);
    }

    /**
     * @param iterable<array-key, TypeStatement> $types
     */
    private function containsMixed(iterable $types): bool
    {
        foreach ($types as $type) {
            if ($this->isMixed($type)) {
                return true;
            }
        }

        return false;
    }

    private function isMixed(TypeStatement $type): bool
    {
        return $type instanceof NamedTypeNode
            && $type->name->toLowerString() === 'mixed';
    }

    private function buildReference(MetaReferenceType $type): TypeStatement
    {
        if ($type->name === 'LSPAny') {
            return $this->any();
        }

        $aliased = $this->ctx->findReferenceFromAliases($type);

        if ($aliased !== null) {
            return $this->build($aliased);
        }

        return new NamedTypeNode($type->name);
    }

    private function buildBaseType(MetaBaseType $type): TypeStatement
    {
        return match ($type) {
            MetaBaseType::URI,
            MetaBaseType::DOCUMENT_URI,
            MetaBaseType::REGEXP => new NamedTypeNode('non-empty-string'),
            MetaBaseType::INTEGER => $this->int(),
            MetaBaseType::UINTEGER => $this->uint(),
            MetaBaseType::DECIMAL => $this->decimal(),
            MetaBaseType::STRING => $this->string(),
            MetaBaseType::BOOLEAN => $this->bool(),
            MetaBaseType::NULL => $this->null(),
        };
    }

    /**
     * TODO Add structural fields.
     */
    private function buildStructure(MetaStructureLiteralType $type): TypeStatement
    {
        return new NamedTypeNode('object');
    }

    public function optional(TypeStatement $type): TypeStatement
    {
        return $this->unionOf([$type, $this->null()]);
    }

    private function buildEnumType(MetaEnumerationType $type): TypeStatement
    {
        return match ($type) {
            MetaEnumerationType::STRING => $this->buildBaseType(MetaBaseType::STRING),
            MetaEnumerationType::INTEGER => $this->buildBaseType(MetaBaseType::INTEGER),
            MetaEnumerationType::UINTEGER => $this->buildBaseType(MetaBaseType::UINTEGER),
        };
    }

    public function buildNullable(?MetaTypeInterface $type): ?TypeStatement
    {
        if ($type === null) {
            return null;
        }

        return $this->build($type);
    }

    public function build(MetaTypeInterface $type): TypeStatement
    {
        return match (true) {
            $type instanceof MetaEnumerationType => $this->buildEnumType($type),
            $type instanceof MetaReferenceType => $this->buildReference($type),
            $type instanceof MetaBaseType => $this->buildBaseType($type),
            $type instanceof MetaOrType => $this->unionOf(
                types: $this->buildAll($type->items),
            ),
            $type instanceof MetaAndType => $this->intersectionOf(
                types: $this->buildAll($type->items),
            ),
            $type instanceof MetaArrayType => $this->arrayOf(
                type: $this->build($type->element),
            ),
            $type instanceof MetaMapType => $this->mapOf(
                key: $this->build($type->key),
                value: $this->build($type->value),
            ),
            $type instanceof MetaTupleType => $this->tupleOf(
                types: $this->buildAll($type->items),
            ),
            $type instanceof MetaStringLiteralType => $this->stringOf($type->value),
            $type instanceof MetaIntegerLiteralType => $this->intOf($type->value),
            $type instanceof MetaBooleanLiteralType => $this->boolOf($type->value),
            $type instanceof MetaStructureLiteralType => $this->buildStructure($type),
            default => throw new \InvalidArgumentException(
                message: 'Invalid type of class ' . $type::class,
            ),
        };
    }

    /**
     * @param iterable<array-key, MetaTypeInterface> $types
     *
     * @return iterable<array-key, TypeStatement>
     */
    public function buildAll(iterable $types): iterable
    {
        foreach ($types as $key => $type) {
            yield $key => $this->build($type);
        }
    }
}
