<?php

namespace Lsp\Protocol\Shutdown;

/**
 * A shutdown request is sent from the client to the server.
 * It is sent once when the client decides to shutdown the
 * server. The only notification that is sent after a shutdown request
 * is the exit event.
 */
#[\Lsp\Protocol\Request('shutdown')]
final class ShutdownRequest {}
