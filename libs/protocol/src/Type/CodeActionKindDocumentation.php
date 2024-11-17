<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Documentation for a class of code actions.
 *
 * @since 3.18.0
 *
 * @internal This is a proposed type, which means that the implementation of
 *           this type is not final. Please use this type at your own risk.
 */
final class CodeActionKindDocumentation
{
    public function __construct(
        /**
         * The kind of the code action being documented.
         *
         * If the kind is generic, such as `CodeActionKind.Refactor`, the
         * documentation will be shown whenever any refactorings are returned.
         * If the kind if more specific, such as
         * `CodeActionKind.RefactorExtract`, the documentation will only be
         * shown when extract refactoring code actions are returned.
         *
         * @var CodeActionKind|non-empty-string
         */
        public readonly string|CodeActionKind $kind,
        /**
         * Command that is ued to display the documentation to the user.
         *
         * The title of this documentation code action is taken from {@linkcode
         * Command.title}.
         */
        public readonly Command $command,
    ) {}
}
