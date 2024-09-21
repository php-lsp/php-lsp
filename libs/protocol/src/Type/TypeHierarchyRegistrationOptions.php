<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Type hierarchy options used during static or dynamic registration.
 *
 * @since 3.17.0
 *
 * @generated 2024-09-21
 */
final class TypeHierarchyRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;
    use TypeHierarchyOptionsMixin;
    use StaticRegistrationOptionsMixin;

    /**
     * @param list<object{
     *            language: string,
     *            scheme: string,
     *            pattern: string
     *        }|NotebookCellTextDocumentFilter>|null $documentSelector A document
     *        selector to identify the scope of the registration. If set to null the
     *        document selector provided on the client side will be used.
     * @param string|null $id The id used to register the request. The id can be
     *        used to deregister the request again. See also Registration#id.
     */
    public function __construct(?array $documentSelector = null, ?bool $workDoneProgress = null, ?string $id = null)
    {
        $this->documentSelector = $documentSelector;
        $this->workDoneProgress = $workDoneProgress;
        $this->id = $id;
    }
}
