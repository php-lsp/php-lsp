<?php

namespace Lsp\Protocol\InlayHint\Resolve;

/**
 * A request to resolve additional properties for an inlay hint.
 * The request's parameter is of type {@link InlayHint}, the response is
 * of type {@link InlayHint} or a Thenable that resolves to such.
 *
 * @since 3.17.0
 */
#[\Lsp\Protocol\Request('inlayHint/resolve')]
final class InlayHintResolveRequest {}
