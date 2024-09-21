<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Client workspace capabilities specific to folding ranges.
 *
 * @since 3.18.0
 *
 * @internal This is a proposed type, which means that the implementation of
 *           this type is not final. Please use this type at your own risk.
 *
 * @generated 2024-09-21
 */
final class FoldingRangeWorkspaceClientCapabilities
{
    public function __construct(
        /**
         * Whether the client implementation supports a refresh request sent
         * from the server to the client.
         *
         * Note that this event is global and will force the client to refresh
         * all folding ranges currently shown. It should be used with absolute
         * care and is useful for situation where a server for example detects a
         * project wide change that requires such a calculation.
         *
         * @since 3.18.0
         *
         * @internal This is a proposed type, which means that the
         *           implementation of this type is not final. Please use this type at
         *           your own risk.
         */
        public readonly ?bool $refreshSupport = null,
    ) {}
}
