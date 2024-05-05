<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
final class DidChangeWatchedFilesClientCapabilities
{
    final public function __construct(
        public readonly bool $dynamicRegistration,
        public readonly bool $relativePatternSupport,
    ) {}
}
