<?php

namespace Lsp\Protocol\Type;

trait SignatureHelpOptionsMixin
{
    use WorkDoneProgressOptionsMixin;

    /**
     * List of characters that trigger signature help automatically.
     *
     * @generated
     *
     * @var list<string>
     */
    public readonly array $triggerCharacters;

    /**
     * List of characters that re-trigger signature help.
     *
     * These trigger characters are only active when signature help is already showing. All trigger characters
     * are also counted as re-trigger characters.
     *
     * @generated
     *
     * @since 3.15.0
     *
     * @var list<string>
     */
    public readonly array $retriggerCharacters;
}
