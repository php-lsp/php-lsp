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
     * @param int<-2147483648, 2147483647>|null $processId
     * @param non-empty-string|null $rootUri
     * @param int<-2147483648, 2147483647>|string|null $workDoneToken
     * @param list<WorkspaceFolder>|null $workspaceFolders
     */
    final public function __construct(
        int|null $processId,
        string|null $rootUri,
        ClientCapabilities $capabilities,
        _InitializeParamsClientInfo|null $clientInfo = null,
        string|null $locale = null,
        string|null $rootPath = null,
        mixed $initializationOptions = null,
        TraceValues|null $trace = null,
        int|string|null $workDoneToken = null,
        array|null $workspaceFolders = null,
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