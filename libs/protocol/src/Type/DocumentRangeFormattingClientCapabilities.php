<?php

namespace Lsp\Protocol\Type;

/**
 * Client capabilities of a {@link DocumentRangeFormattingRequest}.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class DocumentRangeFormattingClientCapabilities
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(
        public readonly bool $dynamicRegistration,
        public readonly bool $rangesSupport,
    ) {}
}
