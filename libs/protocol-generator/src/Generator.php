<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator;

use Lsp\Protocol\Generator\Node\MetaModel;
use Lsp\Protocol\Generator\Printer\Per2Printer;
use Lsp\Protocol\Generator\Visitor\EnumNodeVisitor;
use Lsp\Protocol\Generator\Visitor\ExtractStructLiteralNodeVisitor;
use Lsp\Protocol\Generator\Visitor\MixinNodeVisitor;
use Lsp\Protocol\Generator\Visitor\StructInheritanceNodeVisitor;
use Lsp\Protocol\Generator\Visitor\StandaloneStructNodeVisitor;
use PhpParser\Node as PhpNodeInterface;
use PhpParser\Node\Stmt\ClassLike as PhpClassLikeStatement;
use PhpParser\NodeTraverser;
use PhpParser\NodeVisitor\FirstFindingVisitor;
use PhpParser\NodeVisitor\NameResolver;
use PhpParser\PrettyPrinter as PrettyPrinterInterface;

final class Generator
{
    private readonly PrettyPrinterInterface $printer;

    public function __construct(
        private readonly VersionInterface $version = Version::STABLE,
    ) {
        $this->printer = new Per2Printer();
    }

    /**
     * @return array<array-key, mixed>
     * @throws \JsonException
     */
    private function getMetaModelData(VersionInterface $version): array
    {
        $contents = (string) \file_get_contents($version->getPathname());

        return (array) \json_decode($contents, true, flags: \JSON_THROW_ON_ERROR);
    }

    /**
     * @throws \JsonException
     */
    public function parse(): MetaModel
    {
        $data = $this->getMetaModelData($this->version);

        // @phpstan-ignore-next-line
        return MetaModel::fromArray($data);
    }

    /**
     * @param non-empty-string $namespace
     * @return \ArrayObject<array-key, PhpNodeInterface>
     */
    public function transform(MetaModel $model, string $namespace): \ArrayObject
    {
        $types = new \ArrayObject();

        // Normalize
        $traverser = new NodeTraverser();
        $traverser->addVisitor(new StructInheritanceNodeVisitor());
        $traverser->addVisitor($extractor = new ExtractStructLiteralNodeVisitor());
        $traverser->traverse([$model]);

        // Load additional structures
        foreach ($extractor->getGeneratedStructures() as $structure) {
            $model->structures[] = $structure;
        }

        // Generate
        $traverser = new NodeTraverser();
        $traverser->addVisitor(new EnumNodeVisitor($types, $namespace));
        $traverser->addVisitor(new StandaloneStructNodeVisitor($types, $namespace));
        $traverser->addVisitor(new MixinNodeVisitor($types, $namespace));
        $traverser->traverse([$model]);

        return $types;
    }

    private function getTypeVisitor(): FirstFindingVisitor
    {
        $callback = static fn(PhpNodeInterface $node): bool
            => $node instanceof PhpClassLikeStatement;

        return new FirstFindingVisitor($callback);
    }

    /**
     * @return non-empty-string
     */
    private function getFullQualifiedName(PhpNodeInterface $node): string
    {
        $traverser = new NodeTraverser();
        $traverser->addVisitor(new NameResolver());
        $traverser->addVisitor($type = $this->getTypeVisitor());
        $traverser->traverse([$node]);

        $classLike = $type->getFoundNode();

        if (!$classLike instanceof PhpClassLikeStatement) {
            throw new \InvalidArgumentException('Could not find class like statement');
        }

        if ($classLike->namespacedName !== null) {
            /** @var non-empty-string */
            return $classLike->namespacedName->toString();
        }

        /** @var non-empty-string */
        return $classLike->name?->toString() ?? 'Unknown';
    }

    private function getFilename(PhpNodeInterface $node, string $namespace): string
    {
        $filename = $this->getFullQualifiedName($node);

        if (\str_starts_with($filename, $namespace . '\\')) {
            $filename = \substr($filename, \strlen($namespace) + 1);
        }

        return \str_replace('\\', '/', $filename) . '.php';
    }

    /**
     * @psalm-taint-sink file $directory
     * @param non-empty-string $directory
     * @param non-empty-string $namespace
     * @throws \JsonException
     */
    public function save(string $directory, string $namespace = 'Lsp\\Protocol\\Type'): void
    {
        $types = $this->transform($this->parse(), $namespace);

        foreach ($types as $type) {
            $pathname = $directory . '/' . $this->getFilename($type, $namespace);

            if (!\is_dir(\dirname($pathname))) {
                \mkdir(\dirname($pathname), recursive: true);
            }

            $contents = $this->printer->prettyPrintFile([$type]);

            \file_put_contents($pathname, $contents, \LOCK_EX);
        }
    }
}
