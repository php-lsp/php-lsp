<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
final class WindowClientCapabilities
{
    final public function __construct(
        public readonly bool $workDoneProgress,
        public readonly ShowMessageRequestClientCapabilities $showMessage,
        public readonly ShowDocumentClientCapabilities $showDocument,
    ) {}
}