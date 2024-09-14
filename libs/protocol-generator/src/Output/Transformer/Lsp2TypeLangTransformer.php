<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Output\Transformer;

use Lsp\Protocol\Generator\MetaModel\Node\MetaModel;
use Lsp\Protocol\Generator\MetaModel\Node\Type\AndType;
use Lsp\Protocol\Generator\MetaModel\Node\Type\ArrayType;
use Lsp\Protocol\Generator\MetaModel\Node\Type\BaseType;
use Lsp\Protocol\Generator\MetaModel\Node\Type\BooleanLiteralType;
use Lsp\Protocol\Generator\MetaModel\Node\Type\IntegerLiteralType;
use Lsp\Protocol\Generator\MetaModel\Node\Type\MapType;
use Lsp\Protocol\Generator\MetaModel\Node\Type\OrType;
use Lsp\Protocol\Generator\MetaModel\Node\Type\ReferenceType;
use Lsp\Protocol\Generator\MetaModel\Node\Type\StringLiteralType;
use Lsp\Protocol\Generator\MetaModel\Node\Type\StructureLiteralType;
use Lsp\Protocol\Generator\MetaModel\Node\Type\TupleType;
use Lsp\Protocol\Generator\MetaModel\Node\Type\TypeInterface;
use TypeLang\Parser\Node\Literal\BoolLiteralNode;
use TypeLang\Parser\Node\Literal\IntLiteralNode;
use TypeLang\Parser\Node\Literal\NullLiteralNode;
use TypeLang\Parser\Node\Literal\StringLiteralNode;
use TypeLang\Parser\Node\Stmt\IntersectionTypeNode;
use TypeLang\Parser\Node\Stmt\NamedTypeNode;
use TypeLang\Parser\Node\Stmt\Shape\FieldNode;
use TypeLang\Parser\Node\Stmt\Shape\FieldsListNode;
use TypeLang\Parser\Node\Stmt\Shape\ImplicitFieldNode;
use TypeLang\Parser\Node\Stmt\Template\ArgumentNode;
use TypeLang\Parser\Node\Stmt\Template\ArgumentsListNode;
use TypeLang\Parser\Node\Stmt\TypeStatement;
use TypeLang\Parser\Node\Stmt\UnionTypeNode;

final class Lsp2TypeLangTransformer
{
    public function __construct(
        private readonly MetaModel $ctx,
    ) {}

    public static function make(MetaModel $ctx, TypeInterface $type): TypeStatement
    {
        return (new self($ctx))->transform($type);
    }

    public function transform(TypeInterface $type): TypeStatement
    {
        return match (true) {
            $type instanceof ReferenceType => match (true) {
                $type->name === 'LSPAny' => new NamedTypeNode('mixed'),
                ($aliased = $this->ctx->findReferenceFromAliases($type)) !== null => $this->transform($aliased),
                default => new NamedTypeNode($type->name),
            },
            $type instanceof BaseType => match ($type) {
                BaseType::URI,
                BaseType::DOCUMENT_URI,
                BaseType::REGEXP => new NamedTypeNode('non-empty-string'),
                BaseType::INTEGER => new NamedTypeNode(
                    name: 'int',
                    arguments: new ArgumentsListNode([
                        new ArgumentNode(new IntLiteralNode(-2147483647 - 1)),
                        new ArgumentNode(new IntLiteralNode(2147483647)),
                    ]),
                ),
                BaseType::UINTEGER => new NamedTypeNode(
                    name: 'int',
                    arguments: new ArgumentsListNode([
                        new ArgumentNode(new IntLiteralNode(0)),
                        new ArgumentNode(new IntLiteralNode(2147483647)),
                    ]),
                ),
                BaseType::DECIMAL => new NamedTypeNode('float'),
                BaseType::STRING => new NamedTypeNode('string'),
                BaseType::BOOLEAN => new NamedTypeNode('bool'),
                BaseType::NULL => new NullLiteralNode(),
            },
            $type instanceof OrType => new UnionTypeNode(
                ...$this->transformAll($type->items),
            ),
            $type instanceof AndType => new IntersectionTypeNode(
                ...$this->transformAll($type->items),
            ),
            $type instanceof ArrayType => new NamedTypeNode(
                name: 'list',
                arguments: new ArgumentsListNode([
                    new ArgumentNode($this->transform($type->element)),
                ]),
            ),
            $type instanceof MapType => new NamedTypeNode(
                name: 'array',
                arguments: new ArgumentsListNode([
                    new ArgumentNode($this->transform($type->key)),
                    new ArgumentNode($this->transform($type->value)),
                ]),
            ),
            $type instanceof TupleType => new NamedTypeNode(
                name: 'array',
                arguments: null,
                fields: new FieldsListNode(
                    list: $this->transformAllAsImplicitFields($type->items),
                    sealed: true,
                ),
            ),
            $type instanceof StringLiteralType => new StringLiteralNode($type->value),
            $type instanceof IntegerLiteralType => new IntLiteralNode($type->value),
            $type instanceof BooleanLiteralType => new BoolLiteralNode($type->value),
            // TODO
            $type instanceof StructureLiteralType => new NamedTypeNode('object'),
            default => throw new \InvalidArgumentException(
                message: 'Invalid type of class ' . $type::class,
            ),
        };
    }

    /**
     * @param iterable<array-key, TypeInterface> $types
     *
     * @return list<TypeStatement>
     */
    private function transformAll(iterable $types): array
    {
        $result = [];

        foreach ($types as $type) {
            $result[] = $this->transform($type);
        }

        return $result;
    }

    /**
     * @param iterable<array-key, TypeInterface> $types
     *
     * @return list<FieldNode>
     */
    private function transformAllAsImplicitFields(iterable $types): array
    {
        $result = [];

        foreach ($types as $type) {
            $result[] = new ImplicitFieldNode($this->transform($type));
        }

        return $result;
    }
}
