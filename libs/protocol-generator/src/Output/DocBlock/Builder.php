<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Output\DocBlock;

use PhpParser\Comment\Doc as PhpDocBlock;

final class Builder
{
    /**
     * @param iterable<non-empty-string, mixed> $tags
     */
    public function buildIfNotEmpty(?string $documentation, iterable $tags = []): ?PhpDocBlock
    {
        $result = $this->build($documentation, $tags);

        if (\trim($result->getText()) === '') {
            return null;
        }

        return $result;
    }

    /**
     * @param iterable<non-empty-string, mixed> $tags
     */
    public function build(?string $documentation, iterable $tags = []): PhpDocBlock
    {
        $lines = $after = [];

        foreach (self::explodeDocumentation($documentation) as $line) {
            $lines[] = \rtrim(' * ' . $line);
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
            return new PhpDocBlock('');
        }

        if ($lines !== [] && $after !== []) {
            $lines[] = ' *';
        }

        $comment = \implode("\n", [...$lines, ...$after]);

        return new PhpDocBlock(<<<PHPDOC
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
