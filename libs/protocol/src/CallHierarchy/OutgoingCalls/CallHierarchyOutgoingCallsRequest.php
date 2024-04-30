<?php

namespace Lsp\Protocol\CallHierarchy\OutgoingCalls;

/**
 * A request to resolve the outgoing calls for a given `CallHierarchyItem`.
 *
 * @since 3.16.0
 */
#[\Lsp\Protocol\Request('callHierarchy/outgoingCalls')]
final class CallHierarchyOutgoingCallsRequest {}
