<?php

namespace Lsp\Protocol\Type;

/**
 * Client capabilities of a {@link DocumentRangeFormattingRequest}.
 *
 * @generated
 */
final class DocumentRangeFormattingClientCapabilities
{
    final public function __construct(
        public readonly bool|null $dynamicRegistration = null,
        public readonly bool|null $rangesSupport = null,
    ) {}
}