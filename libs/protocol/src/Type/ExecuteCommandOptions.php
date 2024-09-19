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
     * @param list<string> $commands
     */
    public function __construct(array $commands, bool|null $workDoneProgress)
    {
            $this->commands = $commands;
    
            $this->workDoneProgress = $workDoneProgress;
    }
}