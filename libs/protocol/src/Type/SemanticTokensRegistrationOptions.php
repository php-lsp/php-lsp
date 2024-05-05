<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 * @since 3.16.0
 */
final class SemanticTokensRegistrationOptions
{
    use StaticRegistrationOptionsMixin;

    use TextDocumentRegistrationOptionsMixin;

    use SemanticTokensOptionsMixin;

    /**
     * @generated
     * @since 3.16.0
     */
    final public function __construct(
        array|null $documentSelector,
        SemanticTokensLegend $legend,
        bool|object $range,
        bool|object $full,
        bool $workDoneProgress,
        string $id,
    ) {
        $this->documentSelector = $documentSelector;

        $this->legend = $legend;

        $this->range = $range;

        $this->full = $full;

        $this->workDoneProgress = $workDoneProgress;

        $this->id = $id;
    }
}
