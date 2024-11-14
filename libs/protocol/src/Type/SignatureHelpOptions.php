<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Server Capabilities for a {@link SignatureHelpRequest}.
 *
 * @generated 2024-11-14
 */
final class SignatureHelpOptions
{
    use SignatureHelpOptionsMixin;

    /**
     * @param list<string>|null $triggerCharacters list of characters that
     *        trigger signature help automatically
     * @param list<string>|null $retriggerCharacters List of characters that
     *        re-trigger signature help.
     *
     *        These trigger characters are only active when signature help is already
     *        showing. All trigger characters are also counted as re-trigger
     *        characters.
     */
    public function __construct(?array $triggerCharacters = null, ?array $retriggerCharacters = null, ?bool $workDoneProgress = null)
    {
        $this->triggerCharacters = $triggerCharacters;
        $this->retriggerCharacters = $retriggerCharacters;
        $this->workDoneProgress = $workDoneProgress;
    }
}
