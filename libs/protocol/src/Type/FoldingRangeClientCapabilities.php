<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-11-15
 */
final class FoldingRangeClientCapabilities
{
    public function __construct(
        /**
         * Whether implementation supports dynamic registration for folding
         * range providers. If this is set to `true` the client supports the new
         * `FoldingRangeRegistrationOptions` return value for the corresponding
         * server capability as well.
         */
        public readonly ?bool $dynamicRegistration = null,
        /**
         * The maximum number of folding ranges that the client prefers to
         * receive per document. The value serves as a hint, servers are free to
         * follow the limit.
         *
         * @var int<0, 2147483647>|null
         */
        public readonly ?int $rangeLimit = null,
        /**
         * If set, the client signals that it only supports folding complete
         * lines.
         * If set, client will ignore specified `startCharacter` and
         * `endCharacter` properties in a FoldingRange.
         */
        public readonly ?bool $lineFoldingOnly = null,
        /**
         * Specific options for the folding range kind.
         *
         * @since 3.17.0
         */
        public readonly ?ClientFoldingRangeKindOptions $foldingRangeKind = null,
        /**
         * Specific options for the folding range.
         *
         * @since 3.17.0
         */
        public readonly ?ClientFoldingRangeOptions $foldingRange = null,
    ) {}
}
