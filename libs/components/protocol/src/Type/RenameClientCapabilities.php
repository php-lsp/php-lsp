<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

final class RenameClientCapabilities
{
    public function __construct(
        /**
         * Whether rename supports dynamic registration.
         */
        public readonly ?bool $dynamicRegistration = null,
        /**
         * Client supports testing for validity of rename operations before
         * execution.
         *
         * @since 3.12.0
         */
        public readonly ?bool $prepareSupport = null,
        /**
         * Client supports the default behavior result.
         *
         * The value indicates the default behavior used by the client.
         *
         * @since 3.16.0
         */
        public readonly ?PrepareSupportDefaultBehavior $prepareSupportDefaultBehavior = null,
        /**
         * Whether the client honors the change annotations in text edits and
         * resource operations returned via the rename request's workspace edit
         * by for example presenting the workspace edit in the user interface
         * and asking for confirmation.
         *
         * @since 3.16.0
         */
        public readonly ?bool $honorsChangeAnnotations = null,
    ) {}
}
