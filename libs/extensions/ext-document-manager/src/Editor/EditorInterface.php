<?php

declare(strict_types=1);

namespace Lsp\Extension\DocumentManager\Editor;

use Lsp\Extension\DocumentManager\Editor\Document\Document;

/**
 * @template-extends \Traversable<non-empty-string, Document>
 */
interface EditorInterface extends \Traversable, \Countable
{
    /**
     * @param non-empty-string $uri
     * @return Document|null
     */
    public function findByUriString(string $uri): ?Document;
}
