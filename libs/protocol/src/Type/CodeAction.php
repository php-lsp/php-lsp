<?php

namespace Lsp\Protocol\Type;

/**
 * A code action represents a change that can be performed in code, e.g. to fix a problem or
 * to refactor code.
 *
 * A CodeAction must set either `edit` and/or a `command`. If both are supplied, the `edit` is applied first, then the `command` is executed.
 *
 * @generated
 */
final class CodeAction
{
    /**
     * @param list<Diagnostic> $diagnostics
     */
    final public function __construct(
        public readonly string $title,
        public readonly CodeActionKind $kind,
        public readonly array $diagnostics,
        public readonly bool $isPreferred,
        public readonly CodeActionDisabled $disabled,
        public readonly WorkspaceEdit $edit,
        public readonly Command $command,
        public readonly mixed $data,
    ) {}
}
