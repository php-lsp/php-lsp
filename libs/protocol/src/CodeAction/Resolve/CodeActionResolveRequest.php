<?php

namespace Lsp\Protocol\CodeAction\Resolve;

/**
 * Request to resolve additional information for a given code action.The request's
 * parameter is of type {@link CodeAction} the response
 * is of type {@link CodeAction} or a Thenable that resolves to such.
 */
#[\Lsp\Protocol\Request('codeAction/resolve')]
final class CodeActionResolveRequest {}
