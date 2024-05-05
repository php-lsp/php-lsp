<?php

namespace Lsp\Protocol\Type;

/**
 * Completion client capabilities
 *
 * @generated
 */
final class CompletionClientCapabilities
{
    /**
     * @generated
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
