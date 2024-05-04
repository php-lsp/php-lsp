<?php

namespace Lsp\Protocol\Type;

/**
 * Completion client capabilities
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class CompletionClientCapabilities
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(
        public readonly bool $dynamicRegistration,
        public readonly object $completionItem,
        public readonly object $completionItemKind,
        public readonly InsertTextMode $insertTextMode,
        public readonly bool $contextSupport,
        public readonly object $completionList,
    ) {}
}
