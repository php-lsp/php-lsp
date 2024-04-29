<?php

namespace Lsp\Protocol;

/**
 * A set of predefined code action kinds
 */
enum CodeActionKind: string
{
    /**
     * Empty kind.
     */
    case Empty = '';

    /**
     * Base kind for quickfix actions: 'quickfix'
     */
    case QuickFix = 'quickfix';

    /**
     * Base kind for refactoring actions: 'refactor'
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
     */
    case RefactorRewrite = 'refactor.rewrite';

    /**
     * Base kind for source actions: `source`
     * 
     * Source code actions apply to the entire file.
     */
    case Source = 'source';

    /**
     * Base kind for an organize imports source action: `source.organizeImports`
     */
    case SourceOrganizeImports = 'source.organizeImports';

    /**
     * Base kind for auto-fix source actions: `source.fixAll`.
     * 
     * Fix all actions automatically fix errors that have a clear fix that do not require user input.
     * They should not suppress errors or perform unsafe fixes such as generating new types or classes.
     *
     * @since 3.15.0
     */
    case SourceFixAll = 'source.fixAll';
}