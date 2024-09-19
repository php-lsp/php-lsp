<?php

namespace Lsp\Protocol\Type;

/**
 * The client capabilities of a {@link ExecuteCommandRequest}.
 *
 * @generated
 */
final class ExecuteCommandClientCapabilities
{
    final public function __construct(
        public readonly bool|null $dynamicRegistration = null,
    ) {}
}