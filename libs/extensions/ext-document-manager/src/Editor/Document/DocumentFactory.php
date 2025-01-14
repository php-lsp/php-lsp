<?php

declare(strict_types=1);

namespace Lsp\Extension\DocumentManager\Editor\Document;

use Phplrt\Contracts\Position\PositionFactoryInterface;
use Phplrt\Position\PositionFactory;

final class DocumentFactory implements DocumentFactoryInterface
{
    public function __construct(
        private readonly UriFactoryInterface $factory,
        private readonly PositionFactoryInterface $positions = new PositionFactory(),
    ) {}

    public function create(string $uri, string $content, int $version = 0): Document
    {
        $vo = $this->factory->create($uri);

        return new Document($vo, $content, $version, $this->positions);
    }
}
