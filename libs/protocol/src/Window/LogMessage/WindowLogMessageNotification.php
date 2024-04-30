<?php

namespace Lsp\Protocol\Window\LogMessage;

/**
 * The log message notification is sent from the server to the client to ask
 * the client to log a particular message.
 */
#[\Lsp\Protocol\Notification('window/logMessage')]
final class WindowLogMessageNotification {}
