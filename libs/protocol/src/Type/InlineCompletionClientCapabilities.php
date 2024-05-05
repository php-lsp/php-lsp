<?php

namespace Lsp\Protocol\Type;

/**
 * Client capabilities specific to inline completions.
 *
 * @generated
 * @since 3.18.0
 * @internal Describes the upcoming version of the Language Server Protocol and is under development
 */
final class InlineCompletionClientCapabilities
{
    final public function __construct(
        public readonly bool $dynamicRegistration,
    ) {}
}
