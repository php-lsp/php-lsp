<?php

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link ExecuteCommandRequest}.
 *
 * @generated
 */
final class ExecuteCommandRegistrationOptions
{
    use ExecuteCommandOptionsMixin;

    /**
     * @generated
     */
    final public function __construct(array $commands, bool $workDoneProgress)
    {
        $this->commands = $commands;

        $this->workDoneProgress = $workDoneProgress;
    }
}
