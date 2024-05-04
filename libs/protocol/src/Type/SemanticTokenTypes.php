<?php

namespace Lsp\Protocol\Type;

/**
 * A set of predefined token types. This set is not fixed
 * an clients can specify additional token types via the
 * corresponding client capabilities.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.16.0
 */
enum SemanticTokenTypes: string
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case NamespaceType = 'namespace';

    /**
     * Represents a generic type. Acts as a fallback for types which can't be mapped to
     * a specific type like class or enum.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case TypeType = 'type';

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case ClassType = 'class';

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case EnumType = 'enum';

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case InterfaceType = 'interface';

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case StructType = 'struct';

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case TypeParameterType = 'typeParameter';

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case ParameterType = 'parameter';

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case VariableType = 'variable';

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case PropertyType = 'property';

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case EnumMemberType = 'enumMember';

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case EventType = 'event';

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case FunctionType = 'function';

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case MethodType = 'method';

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case MacroType = 'macro';

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case KeywordType = 'keyword';

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case ModifierType = 'modifier';

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case CommentType = 'comment';

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case StringType = 'string';

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case NumberType = 'number';

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case RegexpType = 'regexp';

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case OperatorType = 'operator';

    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.17.0
     */
    case DecoratorType = 'decorator';
}
