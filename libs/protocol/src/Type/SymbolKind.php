<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A symbol kind.
 */
enum SymbolKind: int
{
    case FileKind = 1;
    case ModuleKind = 2;
    case NamespaceKind = 3;
    case PackageKind = 4;
    case ClassKind = 5;
    case MethodKind = 6;
    case PropertyKind = 7;
    case FieldKind = 8;
    case ConstructorKind = 9;
    case EnumKind = 10;
    case InterfaceKind = 11;
    case FunctionKind = 12;
    case VariableKind = 13;
    case ConstantKind = 14;
    case StringKind = 15;
    case NumberKind = 16;
    case BooleanKind = 17;
    case ArrayKind = 18;
    case ObjectKind = 19;
    case KeyKind = 20;
    case NullKind = 21;
    case EnumMemberKind = 22;
    case StructKind = 23;
    case EventKind = 24;
    case OperatorKind = 25;
    case TypeParameterKind = 26;
}
