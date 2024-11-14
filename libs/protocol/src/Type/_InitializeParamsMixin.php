<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The initialize parameters.
 *
 * @generated 2024-11-14
 */
trait _InitializeParamsMixin
{
    use WorkDoneProgressParamsMixin;
    /**
     * The process Id of the parent process that started the server.
     *
     * Is `null` if the process has not been started by another process.
     * If the parent process is not alive then the server should exit.
     *
     * @var int<-2147483648, 2147483647>|null
     *
     * @readonly
     */
    public ?int $processId = null;
    /**
     * Information about the client.
     *
     * @since 3.15.0
     *
     * @readonly
     */
    public ?_InitializeParamsClientInfo $clientInfo = null;
    /**
     * The locale the client is currently showing the user interface in. This
     * must not necessarily be the locale of the operating system.
     *
     * Uses IETF language tags as the value's syntax
     * (See https://en.wikipedia.org/wiki/IETF_language_tag).
     *
     * @since 3.16.0
     *
     * @readonly
     */
    public ?string $locale = null;
    /**
     * The rootPath of the workspace. Is null if no folder is open.
     *
     * @deprecated in favour of rootUri
     *
     * @readonly
     */
    public ?string $rootPath = null;
    /**
     * The rootUri of the workspace. Is null if no folder is open. If both
     * `rootPath` and `rootUri` are set `rootUri` wins.
     *
     * @deprecated in favour of workspaceFolders
     *
     * @var non-empty-string|null
     *
     * @readonly
     */
    public ?string $rootUri = null;
    /**
     * The capabilities provided by the client (editor or tool).
     */
    public readonly ClientCapabilities $capabilities;
    /**
     * User provided initialization options.
     *
     * @readonly
     */
    public mixed $initializationOptions = null;
    /**
     * The initial trace setting. If omitted trace is disabled ('off').
     *
     * @readonly
     */
    public ?TraceValues $trace = null;
}
