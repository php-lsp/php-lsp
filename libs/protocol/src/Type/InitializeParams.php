<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
final class InitializeParams
{
    use _InitializeParamsMixin;

    use WorkspaceFoldersInitializeParamsMixin;

    /**
     * @generated
     * @param int<-2147483648, 2147483647>|null $processId
     * @param non-empty-string|null $rootUri
     * @param int<-2147483648, 2147483647>|string $workDoneToken
     * @param list<WorkspaceFolder>|null $workspaceFolders
     */
    final public function __construct(
        int|null $processId,
        object $clientInfo,
        string $locale,
        string|null $rootPath,
        string|null $rootUri,
        ClientCapabilities $capabilities,
        mixed $initializationOptions,
        TraceValues $trace,
        int|string $workDoneToken,
        array|null $workspaceFolders,
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

        $this->workspaceFolders = $workspaceFolders;
    }
}
