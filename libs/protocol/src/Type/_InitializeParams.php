<?php

namespace Lsp\Protocol\Type;

/**
 * The initialize parameters
 *
 * @generated
 */
class _InitializeParams
{
    use _InitializeParamsMixin;

    /**
     * @generated
     * @param int<-2147483648, 2147483647>|null $processId
     * @param non-empty-string|null $rootUri
     * @param int<-2147483648, 2147483647>|string $workDoneToken
     */
    public function __construct(
        int|null $processId,
        object $clientInfo,
        string $locale,
        string|null $rootPath,
        string|null $rootUri,
        ClientCapabilities $capabilities,
        mixed $initializationOptions,
        TraceValues $trace,
        int|string $workDoneToken,
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
