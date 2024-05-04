<?php

namespace Lsp\Protocol\Type;

/**
 * A set of predefined token modifiers. This set is not fixed
 * an clients can specify additional token types via the
 * corresponding client capabilities.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.16.0
 */
enum SemanticTokenModifiers: string
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Declaration = 'declaration';

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Definition = 'definition';

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Readonly = 'readonly';

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Static = 'static';

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Deprecated = 'deprecated';

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Abstract = 'abstract';

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Async = 'async';

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Modification = 'modification';

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Documentation = 'documentation';

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case DefaultLibrary = 'defaultLibrary';
}
