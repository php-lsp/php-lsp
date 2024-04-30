<?php

namespace Lsp\Protocol\Window\ShowMessage;

/**
 * The show message notification is sent from a server to a client to ask
 * the client to display a particular message in the user interface.
 */
#[\Lsp\Protocol\Notification('window/showMessage')]
final class WindowShowMessageNotification {}
