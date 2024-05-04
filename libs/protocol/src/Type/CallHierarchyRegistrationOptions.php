<?php

namespace Lsp\Protocol\Type;

/**
 * Call hierarchy options used during static or dynamic registration.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.16.0
 */
final class CallHierarchyRegistrationOptions
{
    use StaticRegistrationOptionsMixin;

    use TextDocumentRegistrationOptionsMixin;

    use CallHierarchyOptionsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.16.0
     */
    final public function __construct(array|null $documentSelector, bool $workDoneProgress, string $id)
    {
        $this->documentSelector = $documentSelector;

        $this->workDoneProgress = $workDoneProgress;

        $this->id = $id;
    }
}
