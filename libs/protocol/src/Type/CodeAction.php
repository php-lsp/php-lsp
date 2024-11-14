<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A code action represents a change that can be performed in code, e.g. to fix
 * a problem or to refactor code.
 *
 * A CodeAction must set either `edit` and/or a `command`. If both are supplied,
 * the `edit` is applied first, then the `command` is executed.
 *
 * @generated 2024-11-14
 */
final class CodeAction
{
    public function __construct(
        /**
         * A short, human-readable, title for this code action.
         */
        public readonly string $title,
        /**
         * The kind of the code action.
         *
         * Used to filter code actions.
         */
        public readonly ?CodeActionKind $kind = null,
        /**
         * The diagnostics that this code action resolves.
         *
         * @var list<Diagnostic>|null
         */
        public readonly ?array $diagnostics = null,
        /**
         * Marks this as a preferred action. Preferred actions are used by the
         * `auto fix` command and can be targeted by keybindings.
         *
         * A quick fix should be marked preferred if it properly addresses the
         * underlying error.
         * A refactoring should be marked preferred if it is the most reasonable
         * choice of actions to take.
         *
         * @since 3.15.0
         */
        public readonly ?bool $isPreferred = null,
        /**
         * Marks that the code action cannot currently be applied.
         *
         * Clients should follow the following guidelines regarding disabled
         * code actions:
         *
         *   - Disabled code actions are not shown in automatic
         * [lightbulbs](https://code.visualstudio.com/docs/editor/editingevolved#_code-action)
         *     code action menus.
         *
         *   - Disabled actions are shown as faded out in the code action menu
         * when the user requests a more specific type
         *     of code action, such as refactorings.
         *
         *   - If the user has a
         * [keybinding](https://code.visualstudio.com/docs/editor/refactoring#_keybindings-for-code-actions)
         *     that auto applies a code action and only disabled code actions
         * are returned, the client should show the user an
         *     error message with `reason` in the editor.
         *
         * @since 3.16.0
         */
        public readonly ?CodeActionDisabled $disabled = null,
        /**
         * The workspace edit this code action performs.
         */
        public readonly ?WorkspaceEdit $edit = null,
        /**
         * A command this code action executes. If a code action provides an
         * edit and a command, first the edit is executed and then the command.
         */
        public readonly ?Command $command = null,
        /**
         * A data entry field that is preserved on a code action between a
         * `textDocument/codeAction` and a `codeAction/resolve` request.
         *
         * @since 3.16.0
         */
        public readonly mixed $data = null,
    ) {}
}
