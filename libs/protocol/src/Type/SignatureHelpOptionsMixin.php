<?php

namespace Lsp\Protocol\Type;

trait SignatureHelpOptionsMixin
{
    use WorkDoneProgressOptionsMixin;

    /**
     * List of characters that trigger signature help automatically.
     *
     * @generated
     * @var list<string>|null
     */
    public array|null $triggerCharacters = null;

    /**
     * List of characters that re-trigger signature help.
     *
     * These trigger characters are only active when signature help is already showing. All trigger characters
     * are also counted as re-trigger characters.
     *
     * @generated
     * @since 3.15.0
     * @var list<string>|null
     */
    public array|null $retriggerCharacters = null;
}