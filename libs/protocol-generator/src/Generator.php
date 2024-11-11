<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator;

use Lsp\Protocol\Generator\IR\IntermediateRepresentationFactory;
use Lsp\Protocol\Generator\IR\Node\IRDocument;
use Lsp\Protocol\Generator\MetaModel\MetaModelFactory;
use Lsp\Protocol\Generator\MetaModel\Node\MetaModel;
use Lsp\Protocol\Generator\Output\OutputFactory;
use PhpParser\Node\Stmt as PhpStatement;

final class Generator
{
    public readonly MetaModelFactory $meta;

    public readonly IntermediateRepresentationFactory $ir;

    public readonly OutputFactory $output;

    public function __construct()
    {
        $this->meta = new MetaModelFactory();
        $this->ir = new IntermediateRepresentationFactory();
        $this->output = new OutputFactory();
    }

    /**
     * @api
     */
    public function getMetaModelForVersion(VersionInterface $version): MetaModel
    {
        return $this->meta->createFromVersion($version);
    }

    /**
     * @api
     */
    public function getDocumentForVersion(VersionInterface $version): IRDocument
    {
        return $this->ir->createFromMetaModel(
            model: $this->getMetaModelForVersion($version),
        );
    }

    /**
     * @api
     *
     * @return iterable<array-key, PhpStatement>
     */
    public function getNodesForVersion(VersionInterface $version): iterable
    {
        return $this->output->buildDocument(
            document: $this->getDocumentForVersion($version),
        );
    }

    /**
     * @api
     *
     * @param non-empty-string|null $namespace
     *
     * @return iterable<non-empty-string, string>
     */
    public function getOutputForVersion(VersionInterface $version, ?string $namespace = null): iterable
    {
        return $this->output->buildDocumentToString(
            document: $this->getDocumentForVersion($version),
            namespace: $namespace,
        );
    }
}
