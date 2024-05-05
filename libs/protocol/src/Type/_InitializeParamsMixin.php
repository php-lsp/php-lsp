<?php

namespace Lsp\Protocol\Type;

trait _InitializeParamsMixin
{
    use WorkDoneProgressParamsMixin;

    /**
     * The process Id of the parent process that started
     * the server.
     *
     * Is `null` if the process has not been started by another process.
     * If the parent process is not alive then the server should exit.
     *
     * @generated
     * @var int<-2147483648, 2147483647>|null
     */
    public readonly int|null $processId;

    /**
     * Information about the client
     *
     * @generated
     * @since 3.15.0
     */
    public readonly object $clientInfo;

    /**
     * The locale the client is currently showing the user interface
     * in. This must not necessarily be the locale of the operating
     * system.
     *
     * Uses IETF language tags as the value's syntax
     * (See https://en.wikipedia.org/wiki/IETF_language_tag)
     *
     * @generated
     * @since 3.16.0
     */
    public readonly string $locale;

    /**
     * The rootPath of the workspace. Is null
     * if no folder is open.
     *
     * @generated
     * @deprecated in favour of rootUri.
     */
    public readonly string|null $rootPath;

    /**
     * The rootUri of the workspace. Is null if no
     * folder is open. If both `rootPath` and `rootUri` are set
     * `rootUri` wins.
     *
     * @generated
     * @deprecated in favour of workspaceFolders.
     * @var non-empty-string|null
     */
    public readonly string|null $rootUri;

    /**
     * The capabilities provided by the client (editor or tool)
     *
     * @generated
     */
    public readonly ClientCapabilities $capabilities;

    /**
     * User provided initialization options.
     *
     * @generated
     */
    public readonly mixed $initializationOptions;

    /**
     * The initial trace setting. If omitted trace is disabled ('off').
     *
     * @generated
     */
    public readonly TraceValues $trace;
}
