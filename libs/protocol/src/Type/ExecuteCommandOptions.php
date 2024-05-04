<?php

namespace Lsp\Protocol\Type;

/**
 * The server capabilities of a {@link ExecuteCommandRequest}.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
class ExecuteCommandOptions
{
    use ExecuteCommandOptionsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @param list<string> $commands
     */
    public function __construct(array $commands, bool $workDoneProgress)
    {
        $this->commands = $commands;

        $this->workDoneProgress = $workDoneProgress;
    }
}
