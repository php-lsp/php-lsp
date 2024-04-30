<?php

namespace Lsp\Protocol\CompletionItem\Resolve;

/**
 * Request to resolve additional information for a given completion item.The request's
 * parameter is of type {@link CompletionItem} the response
 * is of type {@link CompletionItem} or a Thenable that resolves to such.
 */
#[\Lsp\Protocol\Request('completionItem/resolve')]
final class CompletionItemResolveRequest {}
