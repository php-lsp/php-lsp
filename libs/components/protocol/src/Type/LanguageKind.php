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
 */
enum LanguageKind: string
{
    case ABAP = 'abap';
    case WindowsBat = 'bat';
    case BibTeX = 'bibtex';
    case Clojure = 'clojure';
    case Coffeescript = 'coffeescript';
    case C = 'c';
    case CPP = 'cpp';
    case CSharp = 'csharp';
    case CSS = 'css';
    /**
     * @since 3.18.0
     *
     * @internal This is a proposed type, which means that the implementation of
     *           this type is not final. Please use this type at your own risk.
     */
    case D = 'd';
    /**
     * @since 3.18.0
     *
     * @internal This is a proposed type, which means that the implementation of
     *           this type is not final. Please use this type at your own risk.
     */
    case Delphi = 'pascal';
    case Diff = 'diff';
    case Dart = 'dart';
    case Dockerfile = 'dockerfile';
    case Elixir = 'elixir';
    case Erlang = 'erlang';
    case FSharp = 'fsharp';
    case GitCommit = 'git-commit';
    case GitRebase = 'rebase';
    case Go = 'go';
    case Groovy = 'groovy';
    case Handlebars = 'handlebars';
    case Haskell = 'haskell';
    case HTML = 'html';
    case Ini = 'ini';
    case Java = 'java';
    case JavaScript = 'javascript';
    case JavaScriptReact = 'javascriptreact';
    case JSON = 'json';
    case LaTeX = 'latex';
    case Less = 'less';
    case Lua = 'lua';
    case Makefile = 'makefile';
    case Markdown = 'markdown';
    case ObjectiveC = 'objective-c';
    case ObjectiveCPP = 'objective-cpp';
    /**
     * @since 3.18.0
     *
     * @internal This is a proposed type, which means that the implementation of
     *           this type is not final. Please use this type at your own risk.
     */
    public const Pascal = self::Delphi;
    case Perl = 'perl';
    case Perl6 = 'perl6';
    case PHP = 'php';
    case Powershell = 'powershell';
    case Pug = 'jade';
    case Python = 'python';
    case R = 'r';
    case Razor = 'razor';
    case Ruby = 'ruby';
    case Rust = 'rust';
    case SCSS = 'scss';
    case SASS = 'sass';
    case Scala = 'scala';
    case ShaderLab = 'shaderlab';
    case ShellScript = 'shellscript';
    case SQL = 'sql';
    case Swift = 'swift';
    case TypeScript = 'typescript';
    case TypeScriptReact = 'typescriptreact';
    case TeX = 'tex';
    case VisualBasic = 'vb';
    case XML = 'xml';
    case XSL = 'xsl';
    case YAML = 'yaml';
}
