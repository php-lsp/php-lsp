<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Inlay hint options used during static or dynamic registration.
 *
 * @since 3.17.0
 *
 * @generated 2024-09-21
 */
final class InlayHintRegistrationOptions
{
    use InlayHintOptionsMixin;
    use TextDocumentRegistrationOptionsMixin;
    use StaticRegistrationOptionsMixin;

    /**
     * @param bool|null $resolveProvider the server provides support to resolve
     *        additional information for an inlay hint item
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
    public function __construct(
        ?bool $resolveProvider = null,
        ?bool $workDoneProgress = null,
        ?array $documentSelector = null,
        ?string $id = null,
    ) {
        $this->resolveProvider = $resolveProvider;
        $this->workDoneProgress = $workDoneProgress;
        $this->documentSelector = $documentSelector;
        $this->id = $id;
    }
}
