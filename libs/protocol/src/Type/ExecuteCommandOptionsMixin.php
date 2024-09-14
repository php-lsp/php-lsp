<?php

namespace Lsp\Protocol\Type;

trait ExecuteCommandOptionsMixin
{
    use WorkDoneProgressOptionsMixin;

    /**
     * The commands to be executed on the server
     *
     * @generated
     *
     * @var list<string>
     */
    public readonly array $commands;
}
