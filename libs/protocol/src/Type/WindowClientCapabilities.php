<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

final class WindowClientCapabilities
{
    public function __construct(
        /**
         * It indicates whether the client supports server initiated progress
         * using the `window/workDoneProgress/create` request.
         *
         * The capability also controls Whether client supports handling of
         * progress notifications. If set servers are allowed to report a
         * `workDoneProgress` property in the request specific server
         * capabilities.
         *
         * @since 3.15.0
         */
        public readonly ?bool $workDoneProgress = null,
        /**
         * Capabilities specific to the showMessage request.
         *
         * @since 3.16.0
         */
        public readonly ?ShowMessageRequestClientCapabilities $showMessage = null,
        /**
         * Capabilities specific to the showDocument request.
         *
         * @since 3.16.0
         */
        public readonly ?ShowDocumentClientCapabilities $showDocument = null,
    ) {}
}
