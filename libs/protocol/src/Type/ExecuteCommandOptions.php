<?php

namespace Lsp\Protocol\Type;

/**
 * The server capabilities of a {@link ExecuteCommandRequest}.
 *
 * @generated
 */
class ExecuteCommandOptions
{
    use ExecuteCommandOptionsMixin;

    /**
     * @generated
     * @param list<string> $commands
     */
    public function __construct(array $commands, bool $workDoneProgress)
    {
        $this->commands = $commands;

        $this->workDoneProgress = $workDoneProgress;
    }
}
