<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\IR\Visitor\Analyzer;

use Lsp\Protocol\Generator\MetaModel\Node\Enumeration;
use Lsp\Protocol\Generator\MetaModel\Node\Enumeration\MetaEnumerationEntry;
use PhpParser\Node;

/**
 * Adds an attribute with suffix information to the enum
 * if it contains reserved enum case names.
 *
 * ```
 * enum Example1 { // attributes { suffix: "Type" }
 *     case Class; // << contains reserved name "class"
 * }
 *
 * enum Example2 { // attributes { suffix: "" }
 *     case Test;  // << NOT reserved
 * }
 * ```
 */
final class EnumReservedCaseNamesAnalyzerVisitor extends AnalyzerVisitor
{
    /**
     * @var non-empty-string
     */
    public const ENUM_RESERVED_NAMES_ATTRIBUTE = 'suffix';

    /**
     * @var array<non-empty-string, non-empty-string>
     */
    private const ENUM_CASE_SUFFIX_MAP = [
        'Kind' => 'Kind',
    ];

    /**
     * @var non-empty-string
     */
    private const ENUM_CASE_SUFFIX_DEFAULT = 'Type';

    /**
     * @var list<non-empty-string>
     */
    private const ENUM_CASE_RESERVED_NAMES = [
        // "Some::class" is reserved statement
        'class',
    ];

    public function enterNode(Node $node): mixed
    {
        if (!$node instanceof Enumeration) {
            return null;
        }

        $suffix = $this->getEnumCasesSuffix($node);

        $node->setAttribute(self::ENUM_RESERVED_NAMES_ATTRIBUTE, $suffix);

        return null;
    }

    private function getEnumCasesSuffix(Enumeration $enum): string
    {
        if (!$this->hasReservedEnumCaseName($enum)) {
            return '';
        }

        foreach (self::ENUM_CASE_SUFFIX_MAP as $needle => $suffix) {
            if (\str_contains($enum->name, $needle)) {
                return $suffix;
            }
        }

        return self::ENUM_CASE_SUFFIX_DEFAULT;
    }

    private function hasReservedEnumCaseName(Enumeration $enum): bool
    {
        $names = \array_map(static fn(MetaEnumerationEntry $entry): string
            => $entry->name, $enum->values);

        return $this->containsReservedName($names);
    }

    /**
     * @param array<array-key, string> $names
     */
    private function containsReservedName(array $names): bool
    {
        foreach ($names as $name) {
            $lower = \strtolower($name);

            if (\in_array($lower, self::ENUM_CASE_RESERVED_NAMES, true)) {
                return true;
            }
        }

        return false;
    }
}
