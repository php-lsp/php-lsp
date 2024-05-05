<?php

namespace Lsp\Protocol\Type;

/**
 * Contains additional diagnostic information about the context in which
 * a {@link CodeActionProvider.provideCodeActions code action} is run.
 *
 * @generated
 */
final class CodeActionContext
{
    /**
     * @param list<Diagnostic> $diagnostics
     * @param list<CodeActionKind> $only
     */
    final public function __construct(
        public readonly array $diagnostics,
        public readonly array $only,
        public readonly CodeActionTriggerKind $triggerKind,
    ) {}
}
