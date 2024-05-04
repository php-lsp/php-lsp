<?php

namespace Lsp\Protocol\Type;

/**
 * Inline value options used during static or dynamic registration.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.17.0
 */
final class InlineValueRegistrationOptions
{
    use StaticRegistrationOptionsMixin;

    use InlineValueOptionsMixin;

    use TextDocumentRegistrationOptionsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.17.0
     */
    final public function __construct(bool $workDoneProgress, array|null $documentSelector, string $id)
    {
        $this->workDoneProgress = $workDoneProgress;

        $this->documentSelector = $documentSelector;

        $this->id = $id;
    }
}
