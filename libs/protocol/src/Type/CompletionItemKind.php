<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The kind of a completion entry.
 */
enum CompletionItemKind: int
{
    case TextKind = 1;
    case MethodKind = 2;
    case FunctionKind = 3;
    case ConstructorKind = 4;
    case FieldKind = 5;
    case VariableKind = 6;
    case ClassKind = 7;
    case InterfaceKind = 8;
    case ModuleKind = 9;
    case PropertyKind = 10;
    case UnitKind = 11;
    case ValueKind = 12;
    case EnumKind = 13;
    case KeywordKind = 14;
    case SnippetKind = 15;
    case ColorKind = 16;
    case FileKind = 17;
    case ReferenceKind = 18;
    case FolderKind = 19;
    case EnumMemberKind = 20;
    case ConstantKind = 21;
    case StructKind = 22;
    case EventKind = 23;
    case OperatorKind = 24;
    case TypeParameterKind = 25;
}
