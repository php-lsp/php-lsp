<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Support;

use PhpParser\Comment\Doc;

/**
 * @internal This is an internal library class, please do not use it in your code.
 * @psalm-internal Lsp\Protocol\Generator
 */
final class DocCommentBuilder
{
    /**
     * @param array<non-empty-string, mixed> $tags
     */
    public static function build(?string $documentation, array $tags = []): Doc
    {
        $lines = $after = [];

        foreach (self::explodeDocumentation($documentation) as $line) {
            $lines[] = ' * ' . $line;
        }

        foreach ($tags as $tag => $value) {
            switch (true) {
                case $value === true:
                    $after[] = ' * @' . $tag;
                    break;
                case \is_string($value) && $value !== '':
                    $after[] = ' * @' . $tag . ' ' . $value;
                    break;
            }
        }

        if ($lines === [] && $after === []) {
            return new Doc('');
        }

        if ($lines !== [] && $after !== []) {
            $lines[] = ' *';
        }

        $comment = \implode("\n", [...$lines, ...$after]);

        return new Doc(<<<PHPDOC
            /**
             $comment
             */
            PHPDOC);
    }

    /**
     * @return list<string>
     */
    private static function explodeDocumentation(?string $documentation): array
    {
        if ($documentation === null) {
            return [];
        }

        $documentation = self::simplifyDocumentation($documentation);

        if ($documentation === '') {
            return [];
        }

        return \explode("\n", $documentation);
    }

    private static function simplifyDocumentation(string $documentation): string
    {
        $result = (string) \preg_replace('/^@\w+[^\n]*$/ium', '', $documentation);

        return \trim($result);
    }
}
