<?php

namespace Lsp\Protocol\Type;

trait SignatureHelpOptionsMixin
{
    use WorkDoneProgressOptionsMixin;

    /**
     * List of characters that trigger signature help automatically.
     *
     * @generated 2024-05-04T17:58:12+00:00
     * @var list<string>
     */
    public readonly array $triggerCharacters;

    /**
     * List of characters that re-trigger signature help.
     *
     * These trigger characters are only active when signature help is already showing. All trigger characters
     * are also counted as re-trigger characters.
     *
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.15.0
     * @var list<string>
     */
    public readonly array $retriggerCharacters;
}
