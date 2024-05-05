<?php

namespace Lsp\Protocol\Type;

/**
 * Completion client capabilities
 *
 * @generated
 */
final class CompletionClientCapabilities
{
    final public function __construct(
        public readonly bool $dynamicRegistration,
        public readonly CompletionClientCapabilitiesCompletionItem $completionItem,
        public readonly CompletionClientCapabilitiesCompletionItemKind $completionItemKind,
        public readonly InsertTextMode $insertTextMode,
        public readonly bool $contextSupport,
        public readonly CompletionClientCapabilitiesCompletionList $completionList,
    ) {}
}
