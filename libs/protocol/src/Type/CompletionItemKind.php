<?php

namespace Lsp\Protocol\Type;

/**
 * The kind of a completion entry.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
enum CompletionItemKind: int
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case TextType = 1;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case MethodType = 2;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case FunctionType = 3;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case ConstructorType = 4;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case FieldType = 5;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case VariableType = 6;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case ClassType = 7;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case InterfaceType = 8;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case ModuleType = 9;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case PropertyType = 10;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case UnitType = 11;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case ValueType = 12;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case EnumType = 13;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case KeywordType = 14;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case SnippetType = 15;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case ColorType = 16;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case FileType = 17;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case ReferenceType = 18;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case FolderType = 19;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case EnumMemberType = 20;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case ConstantType = 21;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case StructType = 22;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case EventType = 23;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case OperatorType = 24;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case TypeParameterType = 25;
}
