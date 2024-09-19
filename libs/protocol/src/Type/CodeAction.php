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
     * @param list<Diagnostic>|null $diagnostics
     */
    final public function __construct(
        public readonly string $title,
        public readonly CodeActionKind|null $kind = null,
        public readonly array|null $diagnostics = null,
        public readonly bool|null $isPreferred = null,
        public readonly CodeActionDisabled|null $disabled = null,
        public readonly WorkspaceEdit|null $edit = null,
        public readonly Command|null $command = null,
        public readonly mixed $data = null,
    ) {}
}