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
    case NamespaceType = 'namespace';
    /**
     * Represents a generic type. Acts as a fallback for types which can't be
     * mapped to a specific type like class or enum.
     */
    case TypeType = 'type';
    case ClassType = 'class';
    case EnumType = 'enum';
    case InterfaceType = 'interface';
    case StructType = 'struct';
    case TypeParameterType = 'typeParameter';
    case ParameterType = 'parameter';
    case VariableType = 'variable';
    case PropertyType = 'property';
    case EnumMemberType = 'enumMember';
    case EventType = 'event';
    case FunctionType = 'function';
    case MethodType = 'method';
    case MacroType = 'macro';
    case KeywordType = 'keyword';
    case ModifierType = 'modifier';
    case CommentType = 'comment';
    case StringType = 'string';
    case NumberType = 'number';
    case RegexpType = 'regexp';
    case OperatorType = 'operator';
    /**
     * @since 3.17.0
     */
    case DecoratorType = 'decorator';
    /**
     * @since 3.18.0
     */
    case LabelType = 'label';
}
