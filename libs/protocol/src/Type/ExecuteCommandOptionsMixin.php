<?php

namespace Lsp\Protocol\Type;

trait ExecuteCommandOptionsMixin
{
    use WorkDoneProgressOptionsMixin;

    /**
     * The commands to be executed on the server
     *
     * @generated 2024-05-04T17:58:12+00:00
     * @var list<string>
     */
    public readonly array $commands;
}
