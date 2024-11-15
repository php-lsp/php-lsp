<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A set of predefined token modifiers. This set is not fixed an clients can
 * specify additional token types via the corresponding client capabilities.
 *
 * @since 3.16.0
 *
 * @generated 2024-11-15
 */
enum SemanticTokenModifiers: string
{
    /**
     * @var string
     */
    case Declaration = 'declaration';
    /**
     * @var string
     */
    case Definition = 'definition';
    /**
     * @var string
     */
    case Readonly = 'readonly';
    /**
     * @var string
     */
    case Static = 'static';
    /**
     * @var string
     */
    case Deprecated = 'deprecated';
    /**
     * @var string
     */
    case Abstract = 'abstract';
    /**
     * @var string
     */
    case Async = 'async';
    /**
     * @var string
     */
    case Modification = 'modification';
    /**
     * @var string
     */
    case Documentation = 'documentation';
    /**
     * @var string
     */
    case DefaultLibrary = 'defaultLibrary';
}
