<?php

namespace Lsp\Protocol\Type;

/**
 * A set of predefined token types. This set is not fixed
 * an clients can specify additional token types via the
 * corresponding client capabilities.
 *
 * @generated
 *
 * @since 3.16.0
 */
enum SemanticTokenTypes: string
{
    /**
     * @generated
     */
    case NamespaceType = 'namespace';

    /**
     * Represents a generic type. Acts as a fallback for types which can't be mapped to
     * a specific type like class or enum.
     *
     * @generated
     */
    case TypeType = 'type';

    /**
     * @generated
     */
    case ClassType = 'class';

    /**
     * @generated
     */
    case EnumType = 'enum';

    /**
     * @generated
     */
    case InterfaceType = 'interface';

    /**
     * @generated
     */
    case StructType = 'struct';

    /**
     * @generated
     */
    case TypeParameterType = 'typeParameter';

    /**
     * @generated
     */
    case ParameterType = 'parameter';

    /**
     * @generated
     */
    case VariableType = 'variable';

    /**
     * @generated
     */
    case PropertyType = 'property';

    /**
     * @generated
     */
    case EnumMemberType = 'enumMember';

    /**
     * @generated
     */
    case EventType = 'event';

    /**
     * @generated
     */
    case FunctionType = 'function';

    /**
     * @generated
     */
    case MethodType = 'method';

    /**
     * @generated
     */
    case MacroType = 'macro';

    /**
     * @generated
     */
    case KeywordType = 'keyword';

    /**
     * @generated
     */
    case ModifierType = 'modifier';

    /**
     * @generated
     */
    case CommentType = 'comment';

    /**
     * @generated
     */
    case StringType = 'string';

    /**
     * @generated
     */
    case NumberType = 'number';

    /**
     * @generated
     */
    case RegexpType = 'regexp';

    /**
     * @generated
     */
    case OperatorType = 'operator';

    /**
     * @generated
     *
     * @since 3.17.0
     */
    case DecoratorType = 'decorator';
}
