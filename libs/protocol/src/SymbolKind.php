<?php

namespace Lsp\Protocol;

/**
 * A symbol kind.
 */
enum SymbolKind: int
{
    case FileType = 1;


    case ModuleType = 2;


    case NamespaceType = 3;


    case PackageType = 4;


    case ClassType = 5;


    case MethodType = 6;


    case PropertyType = 7;


    case FieldType = 8;


    case ConstructorType = 9;


    case EnumType = 10;


    case InterfaceType = 11;


    case FunctionType = 12;


    case VariableType = 13;


    case ConstantType = 14;


    case StringType = 15;


    case NumberType = 16;


    case BooleanType = 17;


    case ArrayType = 18;


    case ObjectType = 19;


    case KeyType = 20;


    case NullType = 21;


    case EnumMemberType = 22;


    case StructType = 23;


    case EventType = 24;


    case OperatorType = 25;


    case TypeParameterType = 26;
}
