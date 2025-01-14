<?php

declare(strict_types=1);

namespace Lsp\Extension\DocumentManager\Editor;

use Lsp\Extension\DocumentManager\Editor\Document\Document;

/**
 * @template-implements \IteratorAggregate<non-empty-string, Document>
 */
final class Editor implements MutableEditorInterface, \IteratorAggregate
{
    /**
     * @var array<non-empty-string, Document>
     */
    private array $documents = [];

    public function open(Document $document): void
    {
        $this->documents[(string) $document->uri] = $document;
    }

    public function close(Document $document): void
    {
        unset($this->documents[(string) $document->uri]);
    }

    public function findByUriString(string $uri): ?Document
    {
        return $this->documents[$uri] ?? null;
    }

    public function getIterator(): \Traversable
    {
        /** @var \ArrayIterator<non-empty-string, Document> */
        return new \ArrayIterator($this->documents);
    }

    public function count(): int
    {
        return \count($this->documents);
    }
}
