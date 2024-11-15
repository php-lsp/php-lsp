<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-11-15
 */
final class InitializeParams
{
    public function __construct(
        /**
         * The capabilities provided by the client (editor or tool).
         */
        public readonly ClientCapabilities $capabilities,
        /**
         * The process Id of the parent process that started the server.
         *
         * Is `null` if the process has not been started by another process.
         * If the parent process is not alive then the server should exit.
         *
         * @var int<-2147483648, 2147483647>|null
         */
        public readonly ?int $processId = null,
        /**
         * Information about the client.
         *
         * @since 3.15.0
         */
        public readonly ?ClientInfo $clientInfo = null,
        /**
         * The locale the client is currently showing the user interface in.
         * This must not necessarily be the locale of the operating system.
         *
         * Uses IETF language tags as the value's syntax
         * (See https://en.wikipedia.org/wiki/IETF_language_tag).
         *
         * @since 3.16.0
         */
        public readonly ?string $locale = null,
        /**
         * The rootPath of the workspace. Is null if no folder is open.
         *
         * @deprecated in favour of rootUri
         */
        public readonly ?string $rootPath = null,
        /**
         * The rootUri of the workspace. Is null if no folder is open. If both
         * `rootPath` and `rootUri` are set `rootUri` wins.
         *
         * @deprecated in favour of workspaceFolders
         *
         * @var non-empty-string|null
         */
        public readonly ?string $rootUri = null,
        /**
         * User provided initialization options.
         */
        public readonly mixed $initializationOptions = null,
        /**
         * The initial trace setting. If omitted trace is disabled ('off').
         */
        public readonly ?TraceValue $trace = null,
        /**
         * An optional token that a server can use to report work done progress.
         *
         * @var int<-2147483648, 2147483647>|string|null
         */
        public readonly int|string|null $workDoneToken = null,
        /**
         * The workspace folders configured in the client when the server
         * starts.
         *
         * This property is only available if the client supports workspace
         * folders.
         * It can be `null` if the client supports workspace folders but none
         * are configured.
         *
         * @since 3.6.0
         *
         * @var list<WorkspaceFolder>|null
         */
        public readonly ?array $workspaceFolders = null,
    ) {}
}
