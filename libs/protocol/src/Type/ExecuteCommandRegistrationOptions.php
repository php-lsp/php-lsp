<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link ExecuteCommandRequest}.
 *
 * @generated 2024-11-14
 */
final class ExecuteCommandRegistrationOptions
{
    use ExecuteCommandOptionsMixin;

    /**
     * @param list<string> $commands The commands to be executed on the server
     */
    public function __construct(array $commands = [], ?bool $workDoneProgress = null)
    {
        $this->commands = $commands;
        $this->workDoneProgress = $workDoneProgress;
    }
}
