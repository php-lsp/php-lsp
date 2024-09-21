<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The server capabilities of a {@link ExecuteCommandRequest}.
 *
 * @generated 2024-09-21
 */
trait ExecuteCommandOptionsMixin
{
    use WorkDoneProgressOptionsMixin;
    /**
     * The commands to be executed on the server.
     *
     * @var list<string>
     *
     * @readonly
     */
    public array $commands = [];
}
