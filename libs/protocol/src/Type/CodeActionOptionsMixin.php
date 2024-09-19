<?php

namespace Lsp\Protocol\Type;

trait CodeActionOptionsMixin
{
    use WorkDoneProgressOptionsMixin;

    /**
     * CodeActionKinds that this server may return.
     *
     * The list of kinds may be generic, such as `CodeActionKind.Refactor`, or the server
     * may list out every specific kind they provide.
     *
     * @generated
     * @var list<CodeActionKind>|null
     */
    public array|null $codeActionKinds = null;

    /**
     * The server provides support to resolve additional
     * information for a code action.
     *
     * @generated
     * @since 3.16.0
     */
    public bool|null $resolveProvider = null;
}