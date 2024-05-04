<?php

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-05-04T17:58:12+00:00
 */
final class WindowClientCapabilities
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(
        public readonly bool $workDoneProgress,
        public readonly ShowMessageRequestClientCapabilities $showMessage,
        public readonly ShowDocumentClientCapabilities $showDocument,
    ) {}
}
