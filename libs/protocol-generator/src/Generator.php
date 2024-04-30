<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator;

use Lsp\Protocol\Generator\Node\MetaModel;
use Lsp\Protocol\Generator\Printer\Per2Printer;
use Lsp\Protocol\Generator\Visitor\EnumNodeVisitor;
use Lsp\Protocol\Generator\Visitor\NotificationNodeVisitor;
use Lsp\Protocol\Generator\Visitor\RequestNodeVisitor;
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
     * @return \ArrayObject<array-key, PhpNodeInterface>
     */
    public function transform(MetaModel $model): \ArrayObject
    {
        $types = new \ArrayObject();

        $traverser = new NodeTraverser();
        $traverser->addVisitor(new EnumNodeVisitor($types));

        $traverser->addVisitor(new NotificationNodeVisitor($types));
        $traverser->addVisitor(new RequestNodeVisitor($types));

        $traverser->traverse([$model]);

        return $types;
    }

    private function getTypeVisitor(): FirstFindingVisitor
    {
        return new FirstFindingVisitor(static function (PhpNodeInterface $node): bool {
            return $node instanceof PhpClassLikeStatement;
        });
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
     * @throws \JsonException
     */
    public function save(string $directory, string $namespace = 'Lsp\\Protocol'): void
    {
        $types = $this->transform($this->parse());

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
