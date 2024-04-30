<?php

namespace Lsp\Protocol\Window\ShowDocument;

/**
 * A request to show a document. This request might open an
 * external program depending on the value of the URI to open.
 * For example a request to open `https://code.visualstudio.com/`
 * will very likely open the URI in a WEB browser.
 *
 * @since 3.16.0
 */
#[\Lsp\Protocol\Request('window/showDocument')]
final class WindowShowDocumentRequest {}
