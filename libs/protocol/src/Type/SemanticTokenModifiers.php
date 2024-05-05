<?php

namespace Lsp\Protocol\Type;

/**
 * A set of predefined token modifiers. This set is not fixed
 * an clients can specify additional token types via the
 * corresponding client capabilities.
 *
 * @generated
 * @since 3.16.0
 */
enum SemanticTokenModifiers: string
{
    /**
     * @generated
     */
    case Declaration = 'declaration';

    /**
     * @generated
     */
    case Definition = 'definition';

    /**
     * @generated
     */
    case Readonly = 'readonly';

    /**
     * @generated
     */
    case Static = 'static';

    /**
     * @generated
     */
    case Deprecated = 'deprecated';

    /**
     * @generated
     */
    case Abstract = 'abstract';

    /**
     * @generated
     */
    case Async = 'async';

    /**
     * @generated
     */
    case Modification = 'modification';

    /**
     * @generated
     */
    case Documentation = 'documentation';

    /**
     * @generated
     */
    case DefaultLibrary = 'defaultLibrary';
}
