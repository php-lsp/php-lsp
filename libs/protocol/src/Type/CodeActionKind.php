<?php

namespace Lsp\Protocol\Type;

/**
 * A set of predefined code action kinds
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
enum CodeActionKind: string
{
    /**
     * Empty kind.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Empty = '';

    /**
     * Base kind for quickfix actions: 'quickfix'
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case QuickFix = 'quickfix';

    /**
     * Base kind for refactoring actions: 'refactor'
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Refactor = 'refactor';

    /**
     * Base kind for refactoring extraction actions: 'refactor.extract'
     *
     * Example extract actions:
     *
     * - Extract method
     * - Extract function
     * - Extract variable
     * - Extract interface from class
     * - ...
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case RefactorExtract = 'refactor.extract';

    /**
     * Base kind for refactoring inline actions: 'refactor.inline'
     *
     * Example inline actions:
     *
     * - Inline function
     * - Inline variable
     * - Inline constant
     * - ...
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case RefactorInline = 'refactor.inline';

    /**
     * Base kind for refactoring rewrite actions: 'refactor.rewrite'
     *
     * Example rewrite actions:
     *
     * - Convert JavaScript function to class
     * - Add or remove parameter
     * - Encapsulate field
     * - Make method static
     * - Move method to base class
     * - ...
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case RefactorRewrite = 'refactor.rewrite';

    /**
     * Base kind for source actions: `source`
     *
     * Source code actions apply to the entire file.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Source = 'source';

    /**
     * Base kind for an organize imports source action: `source.organizeImports`
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case SourceOrganizeImports = 'source.organizeImports';

    /**
     * Base kind for auto-fix source actions: `source.fixAll`.
     *
     * Fix all actions automatically fix errors that have a clear fix that do not require user input.
     * They should not suppress errors or perform unsafe fixes such as generating new types or classes.
     *
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.15.0
     */
    case SourceFixAll = 'source.fixAll';
}
