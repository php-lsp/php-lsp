<?php

namespace Lsp\Protocol\Type;

/**
 * A document link is a range in a text document that links to an internal or external resource, like another
 * text document or a web site.
 *
 * @generated
 */
final class DocumentLink
{
    /**
     * @param non-empty-string|null $target
     */
    final public function __construct(
        public readonly Range $range,
        public readonly string|null $target = null,
        public readonly string|null $tooltip = null,
        public readonly mixed $data = null,
    ) {}
}