<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
final class DidChangeWatchedFilesClientCapabilities
{
    final public function __construct(
        public readonly bool|null $dynamicRegistration = null,
        public readonly bool|null $relativePatternSupport = null,
    ) {}
}