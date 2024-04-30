<?php

namespace Lsp\Protocol;

/**
 * A set of predefined token modifiers. This set is not fixed
 * an clients can specify additional token types via the
 * corresponding client capabilities.
 *
 * @since 3.16.0
 */
enum SemanticTokenModifiers: string
{
    case Declaration = 'declaration';


    case Definition = 'definition';


    case Readonly = 'readonly';


    case Static = 'static';


    case Deprecated = 'deprecated';


    case Abstract = 'abstract';


    case Async = 'async';


    case Modification = 'modification';


    case Documentation = 'documentation';


    case DefaultLibrary = 'defaultLibrary';
}
