<?php

namespace Lsp\Protocol\Workspace\Configuration;

/**
 * The 'workspace/configuration' request is sent from the server to the client to fetch a certain
 * configuration setting.
 *
 * This pull model replaces the old push model where the client signaled configuration change via an
 * event. If the server still needs to react to configuration changes (since the server caches the
 * result of `workspace/configuration` requests) the server should register for an empty configuration
 * change event and empty the cache if such an event is received.
 */
#[\Lsp\Protocol\Request('workspace/configuration')]
final class WorkspaceConfigurationRequest {}
