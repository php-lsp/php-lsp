<?php

namespace Lsp\Protocol\Window\ShowMessageRequest;

/**
 * The show message request is sent from the server to the client to show a message
 * and a set of options actions to the user.
 */
#[\Lsp\Protocol\Request('window/showMessageRequest')]
final class WindowShowMessageRequestRequest {}
