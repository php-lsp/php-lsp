<?php

namespace Lsp\Protocol\CallHierarchy\IncomingCalls;

/**
 * A request to resolve the incoming calls for a given `CallHierarchyItem`.
 *
 * @since 3.16.0
 */
#[\Lsp\Protocol\Request('callHierarchy/incomingCalls')]
final class CallHierarchyIncomingCallsRequest {}
