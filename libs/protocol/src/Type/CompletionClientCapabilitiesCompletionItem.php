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
        public readonly bool $snippetSupport,
        public readonly bool $commitCharactersSupport,
        public readonly array $documentationFormat,
        public readonly bool $deprecatedSupport,
        public readonly bool $preselectSupport,
        public readonly object $tagSupport,
        public readonly bool $insertReplaceSupport,
        public readonly object $resolveSupport,
        public readonly object $insertTextModeSupport,
        public readonly bool $labelDetailsSupport,
    ) {}
}
