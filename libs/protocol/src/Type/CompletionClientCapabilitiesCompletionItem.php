<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 * @internal This class is an internal dependency of {@see CompletionClientCapabilities}
 */
final class CompletionClientCapabilitiesCompletionItem
{
    /**
     * @param list<MarkupKind> $documentationFormat
     */
    final public function __construct(
        public readonly bool $snippetSupport = null,
        public readonly bool $commitCharactersSupport = null,
        public readonly array $documentationFormat = null,
        public readonly bool $deprecatedSupport = null,
        public readonly bool $preselectSupport = null,
        public readonly object $tagSupport = null,
        public readonly bool $insertReplaceSupport = null,
        public readonly object $resolveSupport = null,
        public readonly object $insertTextModeSupport = null,
        public readonly bool $labelDetailsSupport = null,
    ) {}
}