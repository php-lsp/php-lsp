<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A symbol kind.
 *
 * @generated 2024-11-14
 */
enum SymbolKind: int
{
    /**
     * @var int<0, 2147483647>
     */
    case FileKind = 1;
    /**
     * @var int<0, 2147483647>
     */
    case ModuleKind = 2;
    /**
     * @var int<0, 2147483647>
     */
    case NamespaceKind = 3;
    /**
     * @var int<0, 2147483647>
     */
    case PackageKind = 4;
    /**
     * @var int<0, 2147483647>
     */
    case ClassKind = 5;
    /**
     * @var int<0, 2147483647>
     */
    case MethodKind = 6;
    /**
     * @var int<0, 2147483647>
     */
    case PropertyKind = 7;
    /**
     * @var int<0, 2147483647>
     */
    case FieldKind = 8;
    /**
     * @var int<0, 2147483647>
     */
    case ConstructorKind = 9;
    /**
     * @var int<0, 2147483647>
     */
    case EnumKind = 10;
    /**
     * @var int<0, 2147483647>
     */
    case InterfaceKind = 11;
    /**
     * @var int<0, 2147483647>
     */
    case FunctionKind = 12;
    /**
     * @var int<0, 2147483647>
     */
    case VariableKind = 13;
    /**
     * @var int<0, 2147483647>
     */
    case ConstantKind = 14;
    /**
     * @var int<0, 2147483647>
     */
    case StringKind = 15;
    /**
     * @var int<0, 2147483647>
     */
    case NumberKind = 16;
    /**
     * @var int<0, 2147483647>
     */
    case BooleanKind = 17;
    /**
     * @var int<0, 2147483647>
     */
    case ArrayKind = 18;
    /**
     * @var int<0, 2147483647>
     */
    case ObjectKind = 19;
    /**
     * @var int<0, 2147483647>
     */
    case KeyKind = 20;
    /**
     * @var int<0, 2147483647>
     */
    case NullKind = 21;
    /**
     * @var int<0, 2147483647>
     */
    case EnumMemberKind = 22;
    /**
     * @var int<0, 2147483647>
     */
    case StructKind = 23;
    /**
     * @var int<0, 2147483647>
     */
    case EventKind = 24;
    /**
     * @var int<0, 2147483647>
     */
    case OperatorKind = 25;
    /**
     * @var int<0, 2147483647>
     */
    case TypeParameterKind = 26;
}
