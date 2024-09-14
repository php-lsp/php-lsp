<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator;

use Lsp\Protocol\Generator\MetaModel\Factory;
use Lsp\Protocol\Generator\MetaModel\Node\MetaModel;
use Lsp\Protocol\Generator\Output\OutputTransformer;
use Lsp\Protocol\Generator\Output\Printer\Per2Printer;
use PhpParser\PrettyPrinter as PrettyPrinterInterface;

final class Generator
{
    private readonly PrettyPrinterInterface $printer;

    public readonly Factory $meta;

    public function __construct()
    {
        $this->printer = new Per2Printer();
        $this->meta = new Factory();
    }

    /**
     * @api
     */
    public function forVersion(VersionInterface $version): OutputTransformer
    {
        return $this->forMetaModel(
            model: $this->meta->createFromVersion(
                version: $version,
            ),
        );
    }

    /**
     * @api
     */
    public function forLatestVersion(): OutputTransformer
    {
        return $this->forVersion(Version::LATEST);
    }

    /**
     * @api
     */
    public function forStableVersion(): OutputTransformer
    {
        return $this->forVersion(Version::STABLE);
    }

    /**
     * @api
     */
    public function forMetaModel(MetaModel $model): OutputTransformer
    {
        return new OutputTransformer($model);
    }
}
