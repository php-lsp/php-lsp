<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Provider options for a {@link CodeActionRequest}.
 *
 * @generated 2024-11-15
 */
final class CodeActionOptions
{
    public function __construct(
        /**
         * CodeActionKinds that this server may return.
         *
         * The list of kinds may be generic, such as `CodeActionKind.Refactor`,
         * or the server may list out every specific kind they provide.
         *
         * @var list<CodeActionKind>|null
         */
        public readonly ?array $codeActionKinds = null,
        /**
         * Static documentation for a class of code actions.
         *
         * Documentation from the provider should be shown in the code actions
         * menu if either:
         *
         * - Code actions of `kind` are requested by the editor. In this case,
         * the editor will show the documentation that
         *   most closely matches the requested code action kind. For example,
         * if a provider has documentation for
         *   both `Refactor` and `RefactorExtract`, when the user requests code
         * actions for `RefactorExtract`,
         *   the editor will use the documentation for `RefactorExtract` instead
         * of the documentation for `Refactor`.
         *
         * - Any code actions of `kind` are returned by the provider.
         *
         * At most one documentation entry should be shown per provider.
         *
         * @since 3.18.0
         *
         * @internal This is a proposed type, which means that the
         *           implementation of this type is not final. Please use this type at
         *           your own risk.
         *
         * @var list<CodeActionKindDocumentation>|null
         */
        public readonly ?array $documentation = null,
        /**
         * The server provides support to resolve additional information for a
         * code action.
         *
         * @since 3.16.0
         */
        public readonly ?bool $resolveProvider = null,
        public readonly ?bool $workDoneProgress = null,
    ) {}
}
