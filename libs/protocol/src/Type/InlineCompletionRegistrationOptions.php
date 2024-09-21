<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Inline completion options used during static or dynamic registration.
 *
 * @since 3.18.0
 *
 * @internal This is a proposed type, which means that the implementation of
 *           this type is not final. Please use this type at your own risk.
 *
 * @generated 2024-09-21
 */
final class InlineCompletionRegistrationOptions
{
    use InlineCompletionOptionsMixin;
    use TextDocumentRegistrationOptionsMixin;
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
    public function __construct(?bool $workDoneProgress = null, ?array $documentSelector = null, ?string $id = null)
    {
        $this->workDoneProgress = $workDoneProgress;
        $this->documentSelector = $documentSelector;
        $this->id = $id;
    }
}
