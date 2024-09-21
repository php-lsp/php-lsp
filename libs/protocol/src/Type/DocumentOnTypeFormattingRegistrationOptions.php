<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link DocumentOnTypeFormattingRequest}.
 *
 * @generated 2024-09-21
 */
final class DocumentOnTypeFormattingRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;
    use DocumentOnTypeFormattingOptionsMixin;

    /**
     * @param list<object{
     *            language: string,
     *            scheme: string,
     *            pattern: string
     *        }|NotebookCellTextDocumentFilter>|null $documentSelector A document
     *        selector to identify the scope of the registration. If set to null the
     *        document selector provided on the client side will be used.
     * @param string $firstTriggerCharacter a character on which formatting
     *        should be triggered, like `{`
     * @param list<string>|null $moreTriggerCharacter more trigger characters
     */
    public function __construct(string $firstTriggerCharacter, ?array $documentSelector = null, ?array $moreTriggerCharacter = null)
    {
        $this->documentSelector = $documentSelector;
        $this->firstTriggerCharacter = $firstTriggerCharacter;
        $this->moreTriggerCharacter = $moreTriggerCharacter;
    }
}
