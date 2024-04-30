<?php

namespace Lsp\Protocol\Client\RegisterCapability;

/**
 * The `client/registerCapability` request is sent from the server to the client to register a new capability
 * handler on the client side.
 */
#[\Lsp\Protocol\Request('client/registerCapability')]
final class ClientRegisterCapabilityRequest {}
