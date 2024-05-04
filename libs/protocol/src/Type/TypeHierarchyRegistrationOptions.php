<?php

namespace Lsp\Protocol\Type;

/**
 * Type hierarchy options used during static or dynamic registration.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.17.0
 */
final class TypeHierarchyRegistrationOptions
{
    use StaticRegistrationOptionsMixin;

    use TextDocumentRegistrationOptionsMixin;

    use TypeHierarchyOptionsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.17.0
     */
    final public function __construct(array|null $documentSelector, bool $workDoneProgress, string $id)
    {
        $this->documentSelector = $documentSelector;

        $this->workDoneProgress = $workDoneProgress;

        $this->id = $id;
    }
}
