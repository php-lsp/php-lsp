<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Client workspace capabilities specific to inlay hints.
 *
 * @since 3.17.0
 */
final class InlayHintWorkspaceClientCapabilities
{
    public function __construct(
        /**
         * Whether the client implementation supports a refresh request sent
         * from the server to the client.
         *
         * Note that this event is global and will force the client to refresh
         * all inlay hints currently shown. It should be used with absolute care
         * and is useful for situation where a server for example detects a
         * project wide change that requires such a calculation.
         */
        public readonly ?bool $refreshSupport = null,
    ) {}
}
