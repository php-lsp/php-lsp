<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A set of predefined token types. This set is not fixed an clients can specify
 * additional token types via the corresponding client capabilities.
 *
 * @since 3.16.0
 */
enum SemanticTokenTypes: string
{
    /**
     * @var string
     */
    case NamespaceType = 'namespace';
    /**
     * Represents a generic type. Acts as a fallback for types which can't be
     * mapped to a specific type like class or enum.
     *
     * @var string
     */
    case TypeType = 'type';
    /**
     * @var string
     */
    case ClassType = 'class';
    /**
     * @var string
     */
    case EnumType = 'enum';
    /**
     * @var string
     */
    case InterfaceType = 'interface';
    /**
     * @var string
     */
    case StructType = 'struct';
    /**
     * @var string
     */
    case TypeParameterType = 'typeParameter';
    /**
     * @var string
     */
    case ParameterType = 'parameter';
    /**
     * @var string
     */
    case VariableType = 'variable';
    /**
     * @var string
     */
    case PropertyType = 'property';
    /**
     * @var string
     */
    case EnumMemberType = 'enumMember';
    /**
     * @var string
     */
    case EventType = 'event';
    /**
     * @var string
     */
    case FunctionType = 'function';
    /**
     * @var string
     */
    case MethodType = 'method';
    /**
     * @var string
     */
    case MacroType = 'macro';
    /**
     * @var string
     */
    case KeywordType = 'keyword';
    /**
     * @var string
     */
    case ModifierType = 'modifier';
    /**
     * @var string
     */
    case CommentType = 'comment';
    /**
     * @var string
     */
    case StringType = 'string';
    /**
     * @var string
     */
    case NumberType = 'number';
    /**
     * @var string
     */
    case RegexpType = 'regexp';
    /**
     * @var string
     */
    case OperatorType = 'operator';
    /**
     * @since 3.17.0
     *
     * @var string
     */
    case DecoratorType = 'decorator';
    /**
     * @since 3.18.0
     *
     * @var string
     */
    case LabelType = 'label';
}
