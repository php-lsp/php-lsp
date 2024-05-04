<?php

namespace Lsp\Protocol\Type;

/**
 * A symbol kind.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
enum SymbolKind: int
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case FileType = 1;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case ModuleType = 2;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case NamespaceType = 3;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case PackageType = 4;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case ClassType = 5;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case MethodType = 6;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case PropertyType = 7;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case FieldType = 8;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case ConstructorType = 9;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case EnumType = 10;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case InterfaceType = 11;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case FunctionType = 12;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case VariableType = 13;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case ConstantType = 14;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case StringType = 15;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case NumberType = 16;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case BooleanType = 17;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case ArrayType = 18;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case ObjectType = 19;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case KeyType = 20;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case NullType = 21;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case EnumMemberType = 22;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case StructType = 23;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case EventType = 24;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case OperatorType = 25;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case TypeParameterType = 26;
}
