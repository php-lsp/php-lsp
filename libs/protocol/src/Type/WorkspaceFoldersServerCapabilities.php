<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-11-15
 */
final class WorkspaceFoldersServerCapabilities
{
    public function __construct(
        /**
         * The server has support for workspace folders.
         */
        public readonly ?bool $supported = null,
        /**
         * Whether the server wants to receive workspace folder change
         * notifications.
         *
         * If a string is provided the string is treated as an ID under which
         * the notification is registered on the client side. The ID can be used
         * to unregister for these events using the
         * `client/unregisterCapability` request.
         */
        public readonly string|bool|null $changeNotifications = null,
    ) {}
}
