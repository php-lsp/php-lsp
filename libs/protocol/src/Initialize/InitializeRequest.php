<?php

namespace Lsp\Protocol\Initialize;

/**
 * The initialize request is sent from the client to the server.
 * It is sent once as the request after starting up the server.
 * The requests parameter is of type {@link InitializeParams}
 * the response if of type {@link InitializeResult} of a Thenable that
 * resolves to such.
 */
#[\Lsp\Protocol\Request('initialize')]
final class InitializeRequest {}
