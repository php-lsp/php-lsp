<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Predefined Language kinds.
 *
 * @since 3.18.0
 *
 * @internal This is a proposed type, which means that the implementation of
 *           this type is not final. Please use this type at your own risk.
 *
 * @generated 2024-11-15
 */
enum LanguageKind: string
{
    /**
     * @var string
     */
    case ABAP = 'abap';
    /**
     * @var string
     */
    case WindowsBat = 'bat';
    /**
     * @var string
     */
    case BibTeX = 'bibtex';
    /**
     * @var string
     */
    case Clojure = 'clojure';
    /**
     * @var string
     */
    case Coffeescript = 'coffeescript';
    /**
     * @var string
     */
    case C = 'c';
    /**
     * @var string
     */
    case CPP = 'cpp';
    /**
     * @var string
     */
    case CSharp = 'csharp';
    /**
     * @var string
     */
    case CSS = 'css';
    /**
     * @since 3.18.0
     *
     * @internal This is a proposed type, which means that the implementation of
     *           this type is not final. Please use this type at your own risk.
     *
     * @var string
     */
    case D = 'd';
    /**
     * @since 3.18.0
     *
     * @internal This is a proposed type, which means that the implementation of
     *           this type is not final. Please use this type at your own risk.
     *
     * @var string
     */
    case Delphi = 'pascal';
    /**
     * @var string
     */
    case Diff = 'diff';
    /**
     * @var string
     */
    case Dart = 'dart';
    /**
     * @var string
     */
    case Dockerfile = 'dockerfile';
    /**
     * @var string
     */
    case Elixir = 'elixir';
    /**
     * @var string
     */
    case Erlang = 'erlang';
    /**
     * @var string
     */
    case FSharp = 'fsharp';
    /**
     * @var string
     */
    case GitCommit = 'git-commit';
    /**
     * @var string
     */
    case GitRebase = 'rebase';
    /**
     * @var string
     */
    case Go = 'go';
    /**
     * @var string
     */
    case Groovy = 'groovy';
    /**
     * @var string
     */
    case Handlebars = 'handlebars';
    /**
     * @var string
     */
    case Haskell = 'haskell';
    /**
     * @var string
     */
    case HTML = 'html';
    /**
     * @var string
     */
    case Ini = 'ini';
    /**
     * @var string
     */
    case Java = 'java';
    /**
     * @var string
     */
    case JavaScript = 'javascript';
    /**
     * @var string
     */
    case JavaScriptReact = 'javascriptreact';
    /**
     * @var string
     */
    case JSON = 'json';
    /**
     * @var string
     */
    case LaTeX = 'latex';
    /**
     * @var string
     */
    case Less = 'less';
    /**
     * @var string
     */
    case Lua = 'lua';
    /**
     * @var string
     */
    case Makefile = 'makefile';
    /**
     * @var string
     */
    case Markdown = 'markdown';
    /**
     * @var string
     */
    case ObjectiveC = 'objective-c';
    /**
     * @var string
     */
    case ObjectiveCPP = 'objective-cpp';
    /**
     * @since 3.18.0
     *
     * @internal This is a proposed type, which means that the implementation of
     *           this type is not final. Please use this type at your own risk.
     *
     * @var string
     */
    case Pascal = 'pascal';
    /**
     * @var string
     */
    case Perl = 'perl';
    /**
     * @var string
     */
    case Perl6 = 'perl6';
    /**
     * @var string
     */
    case PHP = 'php';
    /**
     * @var string
     */
    case Powershell = 'powershell';
    /**
     * @var string
     */
    case Pug = 'jade';
    /**
     * @var string
     */
    case Python = 'python';
    /**
     * @var string
     */
    case R = 'r';
    /**
     * @var string
     */
    case Razor = 'razor';
    /**
     * @var string
     */
    case Ruby = 'ruby';
    /**
     * @var string
     */
    case Rust = 'rust';
    /**
     * @var string
     */
    case SCSS = 'scss';
    /**
     * @var string
     */
    case SASS = 'sass';
    /**
     * @var string
     */
    case Scala = 'scala';
    /**
     * @var string
     */
    case ShaderLab = 'shaderlab';
    /**
     * @var string
     */
    case ShellScript = 'shellscript';
    /**
     * @var string
     */
    case SQL = 'sql';
    /**
     * @var string
     */
    case Swift = 'swift';
    /**
     * @var string
     */
    case TypeScript = 'typescript';
    /**
     * @var string
     */
    case TypeScriptReact = 'typescriptreact';
    /**
     * @var string
     */
    case TeX = 'tex';
    /**
     * @var string
     */
    case VisualBasic = 'vb';
    /**
     * @var string
     */
    case XML = 'xml';
    /**
     * @var string
     */
    case XSL = 'xsl';
    /**
     * @var string
     */
    case YAML = 'yaml';
}
