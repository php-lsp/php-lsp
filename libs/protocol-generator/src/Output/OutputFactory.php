<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Output;

use Lsp\Protocol\Generator\IR\Node\IRDocument;
use Lsp\Protocol\Generator\IR\Node\IRStatement;
use Lsp\Protocol\Generator\Output\Builder\BuilderInterface;
use Lsp\Protocol\Generator\Output\Builder\EnumBuilder;
use Lsp\Protocol\Generator\Output\Builder\MixinBuilder;
use Lsp\Protocol\Generator\Output\Builder\Service\PhpTypeBuilder;
use Lsp\Protocol\Generator\Output\Builder\StructBuilder;
use Lsp\Protocol\Generator\Output\DocBlock\DocBlockBuilder;
use Lsp\Protocol\Generator\Output\Printer\Per2PhpPrinter;
use Lsp\Protocol\Generator\Output\Printer\PhpPrinter;
use PhpParser\Node\DeclareItem as PhpDeclareParameter;
use PhpParser\Node\Name;
use PhpParser\Node\Scalar\LNumber as PhpIntLiteral;
use PhpParser\Node\Stmt as PhpStatement;
use PhpParser\Node\Stmt\Declare_ as PhpDeclare;
use PhpParser\Node\Stmt\Namespace_ as PhpNamespace;

final class OutputFactory
{
    private PhpPrinter $printer;

    /**
     * @var list<BuilderInterface>
     */
    private array $builders = [];

    public function __construct()
    {
        $this->printer = new Per2PhpPrinter();

        $this->builders = \array_values([
            ...$this->getBuilders(),
        ]);
    }

    /**
     * @return iterable<array-key, BuilderInterface>
     */
    private function getBuilders(): iterable
    {
        $types = new PhpTypeBuilder();
        $phpdoc = new DocBlockBuilder();

        yield new EnumBuilder($types, $phpdoc);
        yield new MixinBuilder($types, $phpdoc);
        yield new StructBuilder($types, $phpdoc);
    }

    /**
     * @api
     */
    public function addBuilder(BuilderInterface $builder): void
    {
        $this->builders[] = $builder;
    }

    public function buildStatement(IRStatement $statement): PhpStatement
    {
        foreach ($this->builders as $builder) {
            $result = $builder->build($statement);

            if ($result !== null) {
                return $result;
            }
        }

        throw new \LogicException(\sprintf(
            'Could not build %s statement',
            $statement->getType(),
        ));
    }

    /**
     * @api
     */
    public function buildStatementToString(IRStatement $statement): string
    {
        return $this->printer->prettyPrint([
            $this->buildStatement($statement),
        ]);
    }

    /**
     * @api
     *
     * @return iterable<non-empty-string, PhpStatement>
     */
    public function buildDocument(IRDocument $document): iterable
    {
        foreach ($document->statements as $statement) {
            yield $statement->name => $this->buildStatement($statement);
        }
    }

    /**
     * @api
     *
     * @param non-empty-string|null $namespace
     *
     * @return iterable<non-empty-string, string>
     */
    public function buildDocumentToString(IRDocument $document, ?string $namespace = null): iterable
    {
        foreach ($this->buildDocument($document) as $name => $stmt) {
            $statements = [
                new PhpDeclare([
                    new PhpDeclareParameter('strict_types', new PhpIntLiteral(1)),
                ]),
            ];

            if ($namespace !== null) {
                $statements[] = new PhpNamespace(
                    name: new Name(\explode('\\', $namespace)),
                    stmts: [$stmt],
                );
            } else {
                $statements[] = $stmt;
            }

            yield $name => $this->printer->prettyPrintFile($statements);
        }
    }
}
