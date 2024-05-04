<?php

namespace Lsp\Protocol\Type;

/**
 * A document link is a range in a text document that links to an internal or external resource, like another
 * text document or a web site.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class DocumentLink
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @param non-empty-string $target
     */
    final public function __construct(
        public readonly Range $range,
        public readonly string $target,
        public readonly string $tooltip,
        public readonly mixed $data,
    ) {}
}
