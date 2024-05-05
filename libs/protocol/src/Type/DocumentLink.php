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
     * @param non-empty-string $target
     */
    final public function __construct(
        public readonly Range $range,
        public readonly string $target,
        public readonly string $tooltip,
        public readonly mixed $data,
    ) {}
}
