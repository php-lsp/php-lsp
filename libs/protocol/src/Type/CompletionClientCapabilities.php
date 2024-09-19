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
        public readonly bool|null $dynamicRegistration = null,
        public readonly CompletionClientCapabilitiesCompletionItem|null $completionItem = null,
        public readonly CompletionClientCapabilitiesCompletionItemKind|null $completionItemKind = null,
        public readonly InsertTextMode|null $insertTextMode = null,
        public readonly bool|null $contextSupport = null,
        public readonly CompletionClientCapabilitiesCompletionList|null $completionList = null,
    ) {}
}