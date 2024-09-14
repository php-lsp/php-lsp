<?php

namespace Lsp\Protocol\Type;

/**
 * General client capabilities.
 *
 * @generated
 *
 * @since 3.16.0
 */
final class GeneralClientCapabilities
{
    /**
     * @param list<PositionEncodingKind> $positionEncodings
     */
    final public function __construct(
        public readonly GeneralClientCapabilitiesStaleRequestSupport $staleRequestSupport,
        public readonly RegularExpressionsClientCapabilities $regularExpressions,
        public readonly MarkdownClientCapabilities $markdown,
        public readonly array $positionEncodings,
    ) {}
}
