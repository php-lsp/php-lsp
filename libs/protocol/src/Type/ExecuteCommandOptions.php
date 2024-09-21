<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The server capabilities of a {@link ExecuteCommandRequest}.
 *
 * @generated 2024-09-21
 */
final class ExecuteCommandOptions
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
