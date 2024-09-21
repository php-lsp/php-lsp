<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Provider options for a {@link CodeActionRequest}.
 *
 * @generated 2024-09-21
 */
trait CodeActionOptionsMixin
{
    use WorkDoneProgressOptionsMixin;
    /**
     * CodeActionKinds that this server may return.
     *
     * The list of kinds may be generic, such as `CodeActionKind.Refactor`, or
     * the server may list out every specific kind they provide.
     *
     * @var list<CodeActionKind>|null
     *
     * @readonly
     */
    public ?array $codeActionKinds = null;
    /**
     * The server provides support to resolve additional information for a code
     * action.
     *
     * @since 3.16.0
     *
     * @readonly
     */
    public ?bool $resolveProvider = null;
}
