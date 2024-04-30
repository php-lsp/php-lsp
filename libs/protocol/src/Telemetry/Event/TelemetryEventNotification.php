<?php

namespace Lsp\Protocol\Telemetry\Event;

/**
 * The telemetry event notification is sent from the server to the client to ask
 * the client to log telemetry data.
 */
#[\Lsp\Protocol\Notification('telemetry/event')]
final class TelemetryEventNotification {}
