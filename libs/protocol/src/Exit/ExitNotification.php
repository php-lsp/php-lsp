<?php

namespace Lsp\Protocol\Exit;

/**
 * The exit event is sent from the client to the server to
 * ask the server to exit its process.
 */
#[\Lsp\Protocol\Notification('exit')]
final class ExitNotification {}
