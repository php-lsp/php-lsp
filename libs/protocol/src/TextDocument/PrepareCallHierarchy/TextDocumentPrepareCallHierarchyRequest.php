<?php

namespace Lsp\Protocol\TextDocument\PrepareCallHierarchy;

/**
 * A request to result a `CallHierarchyItem` in a document at a given position.
 * Can be used as an input to an incoming or outgoing call hierarchy.
 *
 * @since 3.16.0
 */
#[\Lsp\Protocol\Request('textDocument/prepareCallHierarchy')]
final class TextDocumentPrepareCallHierarchyRequest {}
