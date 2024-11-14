<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Inline value options used during static or dynamic registration.
 *
 * @since 3.17.0
 *
 * @generated 2024-11-14
 */
final class InlineValueRegistrationOptions
{
    use InlineValueOptionsMixin;
    use TextDocumentRegistrationOptionsMixin;
    use StaticRegistrationOptionsMixin;

    /**
     * @param list<(TextDocumentFilterLanguage|TextDocumentFilterScheme|TextDocumentFilterPattern|NotebookCellTextDocumentFilter)>|null $documentSelector
     *        A document selector to identify the scope of the registration. If set to
     *        null the document selector provided on the client side will be used.
     * @param string|null $id The id used to register the request. The id can be
     *        used to deregister the request again. See also Registration#id.
     */
    public function __construct(?bool $workDoneProgress = null, ?array $documentSelector = null, ?string $id = null)
    {
        $this->workDoneProgress = $workDoneProgress;
        $this->documentSelector = $documentSelector;
        $this->id = $id;
    }
}
