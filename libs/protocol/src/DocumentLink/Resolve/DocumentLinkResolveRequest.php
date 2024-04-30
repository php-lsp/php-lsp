<?php

namespace Lsp\Protocol\DocumentLink\Resolve;

/**
 * Request to resolve additional information for a given document link. The request's
 * parameter is of type {@link DocumentLink} the response
 * is of type {@link DocumentLink} or a Thenable that resolves to such.
 */
#[\Lsp\Protocol\Request('documentLink/resolve')]
final class DocumentLinkResolveRequest {}
