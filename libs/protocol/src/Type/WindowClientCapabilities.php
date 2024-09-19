<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
final class WindowClientCapabilities
{
    final public function __construct(
        public readonly bool|null $workDoneProgress = null,
        public readonly ShowMessageRequestClientCapabilities|null $showMessage = null,
        public readonly ShowDocumentClientCapabilities|null $showDocument = null,
    ) {}
}