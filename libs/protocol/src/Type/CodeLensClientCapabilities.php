<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The client capabilities  of a {@link CodeLensRequest}.
 *
 * @generated 2024-11-14
 */
final class CodeLensClientCapabilities
{
    public function __construct(
        /**
         * Whether code lens supports dynamic registration.
         */
        public readonly ?bool $dynamicRegistration = null,
        /**
         * Whether the client supports resolving additional code lens properties
         * via a separate `codeLens/resolve` request.
         *
         * @since 3.18.0
         */
        public readonly ?ClientCodeLensResolveOptions $resolveSupport = null,
    ) {}
}
