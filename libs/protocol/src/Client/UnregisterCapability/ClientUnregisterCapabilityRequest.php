<?php

namespace Lsp\Protocol\Client\UnregisterCapability;

/**
 * The `client/unregisterCapability` request is sent from the server to the client to unregister a previously registered capability
 * handler on the client side.
 */
#[\Lsp\Protocol\Request('client/unregisterCapability')]
final class ClientUnregisterCapabilityRequest {}
