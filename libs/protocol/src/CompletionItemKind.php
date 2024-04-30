<?php

namespace Lsp\Protocol;

/**
 * The kind of a completion entry.
 */
enum CompletionItemKind: int
{
    case TextType = 1;


    case MethodType = 2;


    case FunctionType = 3;


    case ConstructorType = 4;


    case FieldType = 5;


    case VariableType = 6;


    case ClassType = 7;


    case InterfaceType = 8;


    case ModuleType = 9;


    case PropertyType = 10;


    case UnitType = 11;


    case ValueType = 12;


    case EnumType = 13;


    case KeywordType = 14;


    case SnippetType = 15;


    case ColorType = 16;


    case FileType = 17;


    case ReferenceType = 18;


    case FolderType = 19;


    case EnumMemberType = 20;


    case ConstantType = 21;


    case StructType = 22;


    case EventType = 23;


    case OperatorType = 24;


    case TypeParameterType = 25;
}
