<?php

namespace Lsp\Protocol\Type;

/**
 * General client capabilities.
 *
 * @generated
 * @since 3.16.0
 */
final class GeneralClientCapabilities
{
    /**
     * @param list<PositionEncodingKind>|null $positionEncodings
     */
    final public function __construct(
        public readonly GeneralClientCapabilitiesStaleRequestSupport|null $staleRequestSupport = null,
        public readonly RegularExpressionsClientCapabilities|null $regularExpressions = null,
        public readonly MarkdownClientCapabilities|null $markdown = null,
        public readonly array|null $positionEncodings = null,
    ) {}
}