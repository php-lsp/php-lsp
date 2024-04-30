<?php

namespace Lsp\Protocol\Window\WorkDoneProgress\Create;

/**
 * The `window/workDoneProgress/create` request is sent from the server to the client to initiate progress
 * reporting from the server.
 */
#[\Lsp\Protocol\Request('window/workDoneProgress/create')]
final class WindowWorkDoneProgressCreateRequest {}
