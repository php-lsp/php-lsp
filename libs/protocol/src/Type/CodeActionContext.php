<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Contains additional diagnostic information about the context in which a {@see
 * CodeActionProvider::$provideCodeActions code action} is run.
 */
final class CodeActionContext
{
    public function __construct(
        /**
         * An array of diagnostics known on the client side overlapping the
         * range provided to the `textDocument/codeAction` request. They are
         * provided so that the server knows which errors are currently
         * presented to the user for the given range. There is no guarantee that
         * these accurately reflect the error state of the resource. The primary
         * parameter to compute code actions is the provided range.
         *
         * @var list<Diagnostic>
         */
        public readonly array $diagnostics = [],
        /**
         * Requested kind of actions to return.
         *
         * Actions not of this kind are filtered out by the client before being
         * shown. So servers can omit computing them.
         *
         * @var list<CodeActionKind>|null
         */
        public readonly ?array $only = null,
        /**
         * The reason why code actions were requested.
         *
         * @since 3.17.0
         */
        public readonly ?CodeActionTriggerKind $triggerKind = null,
    ) {}
}
