<?php

namespace Lsp\Protocol\Workspace\Symbol;

/**
 * A request to list project-wide symbols matching the query string given
* by the {@link WorkspaceSymbolParams}. The response is
* of type {@link SymbolInformation SymbolInformation[]} or a Thenable that
* resolves to such.
*
*
*  need to advertise support for WorkspaceSymbols via the client capability
*  `workspace.symbol.resolveSupport`.
*
* @since 3.17.0 - support for WorkspaceSymbol in the returned data. Clients
need to advertise support for WorkspaceSymbols via the client capability
`workspace.symbol.resolveSupport`.
*/
#[\Lsp\Protocol\Request('workspace/symbol')]
final class WorkspaceSymbolRequest {}
