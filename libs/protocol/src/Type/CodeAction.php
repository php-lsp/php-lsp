<?php

namespace Lsp\Protocol\Type;

/**
 * A code action represents a change that can be performed in code, e.g. to fix a problem or
 * to refactor code.
 *
 * A CodeAction must set either `edit` and/or a `command`. If both are supplied, the `edit` is applied first, then the `command` is executed.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class CodeAction
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @param list<Diagnostic> $diagnostics
     */
    final public function __construct(
        public readonly string $title,
        public readonly CodeActionKind $kind,
        public readonly array $diagnostics,
        public readonly bool $isPreferred,
        public readonly object $disabled,
        public readonly WorkspaceEdit $edit,
        public readonly Command $command,
        public readonly mixed $data,
    ) {}
}
