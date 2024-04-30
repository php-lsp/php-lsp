<?php

namespace Lsp\Protocol\TextDocument\ColorPresentation;

/**
 * A request to list all presentation for a color. The request's
 * parameter is of type {@link ColorPresentationParams} the
 * response is of type {@link ColorInformation ColorInformation[]} or a Thenable
 * that resolves to such.
 */
#[\Lsp\Protocol\Request('textDocument/colorPresentation')]
final class TextDocumentColorPresentationRequest {}
