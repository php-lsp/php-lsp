<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Server Capabilities for a {@link SignatureHelpRequest}.
 *
 * @generated 2024-11-14
 */
trait SignatureHelpOptionsMixin
{
    use WorkDoneProgressOptionsMixin;
    /**
     * List of characters that trigger signature help automatically.
     *
     * @var list<string>|null
     *
     * @readonly
     */
    public ?array $triggerCharacters = null;
    /**
     * List of characters that re-trigger signature help.
     *
     * These trigger characters are only active when signature help is already
     * showing. All trigger characters are also counted as re-trigger
     * characters.
     *
     * @since 3.15.0
     *
     * @var list<string>|null
     *
     * @readonly
     */
    public ?array $retriggerCharacters = null;
}
