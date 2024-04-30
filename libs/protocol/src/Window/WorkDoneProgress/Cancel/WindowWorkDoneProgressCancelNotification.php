<?php

namespace Lsp\Protocol\Window\WorkDoneProgress\Cancel;

/**
 * The `window/workDoneProgress/cancel` notification is sent from  the client to the server to cancel a progress
 * initiated on the server side.
 */
#[\Lsp\Protocol\Notification('window/workDoneProgress/cancel')]
final class WindowWorkDoneProgressCancelNotification {}
