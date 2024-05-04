<?php

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-05-04T17:58:12+00:00
 */
final class InitializeParams
{
    use _InitializeParamsMixin;

    use WorkspaceFoldersInitializeParamsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
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
