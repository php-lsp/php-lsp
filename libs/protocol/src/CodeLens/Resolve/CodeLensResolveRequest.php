<?php

namespace Lsp\Protocol\CodeLens\Resolve;

/**
 * A request to resolve a command for a given code lens.
 */
#[\Lsp\Protocol\Request('codeLens/resolve')]
final class CodeLensResolveRequest {}
