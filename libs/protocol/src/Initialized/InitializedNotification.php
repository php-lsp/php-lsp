<?php

namespace Lsp\Protocol\Initialized;

/**
 * The initialized notification is sent from the client to the
 * server after the client is fully initialized and the server
 * is allowed to send requests from the server to the client.
 */
#[\Lsp\Protocol\Notification('initialized')]
final class InitializedNotification {}
