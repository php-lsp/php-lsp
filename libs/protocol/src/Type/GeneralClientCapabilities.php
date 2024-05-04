<?php

namespace Lsp\Protocol\Type;

/**
 * General client capabilities.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.16.0
 */
final class GeneralClientCapabilities
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.16.0
     * @param list<PositionEncodingKind> $positionEncodings
     */
    final public function __construct(
        public readonly object $staleRequestSupport,
        public readonly RegularExpressionsClientCapabilities $regularExpressions,
        public readonly MarkdownClientCapabilities $markdown,
        public readonly array $positionEncodings,
    ) {}
}
