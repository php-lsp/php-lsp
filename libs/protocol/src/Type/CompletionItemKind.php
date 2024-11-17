<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The kind of a completion entry.
 */
enum CompletionItemKind: int
{
    /**
     * @var int<0, 2147483647>
     */
    case TextKind = 1;
    /**
     * @var int<0, 2147483647>
     */
    case MethodKind = 2;
    /**
     * @var int<0, 2147483647>
     */
    case FunctionKind = 3;
    /**
     * @var int<0, 2147483647>
     */
    case ConstructorKind = 4;
    /**
     * @var int<0, 2147483647>
     */
    case FieldKind = 5;
    /**
     * @var int<0, 2147483647>
     */
    case VariableKind = 6;
    /**
     * @var int<0, 2147483647>
     */
    case ClassKind = 7;
    /**
     * @var int<0, 2147483647>
     */
    case InterfaceKind = 8;
    /**
     * @var int<0, 2147483647>
     */
    case ModuleKind = 9;
    /**
     * @var int<0, 2147483647>
     */
    case PropertyKind = 10;
    /**
     * @var int<0, 2147483647>
     */
    case UnitKind = 11;
    /**
     * @var int<0, 2147483647>
     */
    case ValueKind = 12;
    /**
     * @var int<0, 2147483647>
     */
    case EnumKind = 13;
    /**
     * @var int<0, 2147483647>
     */
    case KeywordKind = 14;
    /**
     * @var int<0, 2147483647>
     */
    case SnippetKind = 15;
    /**
     * @var int<0, 2147483647>
     */
    case ColorKind = 16;
    /**
     * @var int<0, 2147483647>
     */
    case FileKind = 17;
    /**
     * @var int<0, 2147483647>
     */
    case ReferenceKind = 18;
    /**
     * @var int<0, 2147483647>
     */
    case FolderKind = 19;
    /**
     * @var int<0, 2147483647>
     */
    case EnumMemberKind = 20;
    /**
     * @var int<0, 2147483647>
     */
    case ConstantKind = 21;
    /**
     * @var int<0, 2147483647>
     */
    case StructKind = 22;
    /**
     * @var int<0, 2147483647>
     */
    case EventKind = 23;
    /**
     * @var int<0, 2147483647>
     */
    case OperatorKind = 24;
    /**
     * @var int<0, 2147483647>
     */
    case TypeParameterKind = 25;
}
