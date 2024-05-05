<?php

namespace Lsp\Protocol\Type;

/**
 * Client capabilities specific to the moniker request.
 *
 * @generated
 * @since 3.16.0
 */
final class MonikerClientCapabilities
{
    final public function __construct(
        public readonly bool $dynamicRegistration,
    ) {}
}
