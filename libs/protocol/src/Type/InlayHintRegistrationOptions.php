<?php

namespace Lsp\Protocol\Type;

/**
 * Inlay hint options used during static or dynamic registration.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.17.0
 */
final class InlayHintRegistrationOptions
{
    use StaticRegistrationOptionsMixin;

    use InlayHintOptionsMixin;

    use TextDocumentRegistrationOptionsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.17.0
     */
    final public function __construct(
        bool $resolveProvider,
        bool $workDoneProgress,
        array|null $documentSelector,
        string $id,
    ) {
        $this->resolveProvider = $resolveProvider;

        $this->workDoneProgress = $workDoneProgress;

        $this->documentSelector = $documentSelector;

        $this->id = $id;
    }
}
