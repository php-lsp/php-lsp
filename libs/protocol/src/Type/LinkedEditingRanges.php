<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The result of a linked editing range request.
 *
 * @since 3.16.0
 *
 * @generated 2024-11-15
 */
final class LinkedEditingRanges
{
    public function __construct(
        /**
         * A list of ranges that can be edited together. The ranges must have
         * identical length and contain identical text content. The ranges
         * cannot overlap.
         *
         * @var list<Range>
         */
        public readonly array $ranges = [],
        /**
         * An optional word pattern (regular expression) that describes valid
         * contents for the given ranges. If no pattern is provided, the client
         * configuration's word pattern will be used.
         */
        public readonly ?string $wordPattern = null,
    ) {}
}
