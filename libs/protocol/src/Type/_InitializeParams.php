<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The initialize parameters.
 *
 * @generated 2024-09-21
 */
final class _InitializeParams
{
    use _InitializeParamsMixin;

    /**
     * @param int<-2147483648, 2147483647>|null $processId The process Id of the
     *        parent process that started the server.
     *
     *        Is `null` if the process has not been started by another process.
     *        If the parent process is not alive then the server should exit.
     * @param _InitializeParamsClientInfo|null $clientInfo Information about the
     *        client
     * @param string|null $locale The locale the client is currently showing the
     *        user interface in. This must not necessarily be the locale of the
     *        operating system.
     *
     *        Uses IETF language tags as the value's syntax
     *        (See https://en.wikipedia.org/wiki/IETF_language_tag)
     * @param string|null $rootPath The rootPath of the workspace. Is null if no
     *        folder is open.
     * @param non-empty-string|null $rootUri The rootUri of the workspace. Is
     *        null if no folder is open. If both `rootPath` and `rootUri` are set
     *        `rootUri` wins.
     * @param ClientCapabilities $capabilities The capabilities provided by the
     *        client (editor or tool)
     * @param mixed $initializationOptions user provided initialization options
     * @param TraceValues|null $trace The initial trace setting. If omitted
     *        trace is disabled ('off').
     * @param int<-2147483648, 2147483647>|string|null $workDoneToken an
     *        optional token that a server can use to report work done progress
     */
    public function __construct(
        ClientCapabilities $capabilities,
        ?int $processId = null,
        ?_InitializeParamsClientInfo $clientInfo = null,
        ?string $locale = null,
        ?string $rootPath = null,
        ?string $rootUri = null,
        mixed $initializationOptions = null,
        ?TraceValues $trace = null,
        int|string|null $workDoneToken = null,
    ) {
        $this->processId = $processId;
        $this->clientInfo = $clientInfo;
        $this->locale = $locale;
        $this->rootPath = $rootPath;
        $this->rootUri = $rootUri;
        $this->capabilities = $capabilities;
        $this->initializationOptions = $initializationOptions;
        $this->trace = $trace;
        $this->workDoneToken = $workDoneToken;
    }
}
