<?php

namespace Lsp\Protocol\TextDocument\PrepareTypeHierarchy;

/**
 * A request to result a `TypeHierarchyItem` in a document at a given position.
 * Can be used as an input to a subtypes or supertypes type hierarchy.
 *
 * @since 3.17.0
 */
#[\Lsp\Protocol\Request('textDocument/prepareTypeHierarchy')]
final class TextDocumentPrepareTypeHierarchyRequest {}
