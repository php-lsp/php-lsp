<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-09-21
 */
final class DidChangeWatchedFilesClientCapabilities
{
    public function __construct(
        /**
         * Did change watched files notification supports dynamic registration.
         * Please note that the current protocol doesn't support static
         * configuration for file changes from the server side.
         */
        public readonly ?bool $dynamicRegistration = null,
        /**
         * Whether the client has support for {@link RelativePattern relative
         * pattern}
         * or not.
         *
         * @since 3.17.0
         */
        public readonly ?bool $relativePatternSupport = null,
    ) {}
}
