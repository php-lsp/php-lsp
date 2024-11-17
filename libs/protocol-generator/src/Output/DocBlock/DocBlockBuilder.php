<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Output\DocBlock;

use Lsp\Protocol\Generator\IR\Node\IRStatement;
use PhpParser\Comment\Doc as DocComment;
use Psr\Clock\ClockInterface;
use Symfony\Component\Clock\NativeClock;
use TypeLang\Parser\Node\Stmt\TypeStatement;
use TypeLang\Printer\NativeTypePrinter;
use TypeLang\Printer\PrettyPrinter;
use TypeLang\Printer\PrinterInterface;

final class DocBlockBuilder
{
    public function __construct(
        private readonly ClockInterface $clock = new NativeClock(),
        private readonly PrinterInterface $pretty = new PrettyPrinter(
            wrapUnionType: false,
            wrapIntersectionType: false,
        ),
        private readonly PrinterInterface $native = new NativeTypePrinter(),
    ) {}

    public function shouldPrintType(TypeStatement $type): bool
    {
        return $this->pretty->print($type) !== $this->native->print($type);
    }

    public function buildCommentFromDocBlock(DocBlock $block, int $level = 0): ?DocComment
    {
        if ($block->isEmpty()) {
            return null;
        }

        $segments = [];

        if ($block->description !== null) {
            $description = \ucfirst($block->description);

            if (!\str_ends_with($description, '.')) {
                $description .= '.';
            }

            $segments[] = $this->formatDescription($description, $level);
        }

        if ($block->description !== null && $block->tags !== []) {
            $segments[] = '';
        }

        foreach ($block->tags as $tag) {
            $segments[] = $this->buildTagString($tag, $level);
        }

        return new DocComment(\implode("\n", [
            ...$this->formatSegments($segments),
        ]));
    }

    private function formatDescription(string $description, int $level): string
    {
        $length = 77 - ($level * 4);

        $description = \preg_replace('/([\w`])\n([\w`])/isum', '$1 $2', $description)
           ?? $description;

        $diff = \strlen($description) - \strlen(\ltrim($description));

        if ($diff > $length) {
            return \str_repeat(' ', $diff)
                . "\n" . \wordwrap(\ltrim($description), $length);
        }

        return \wordwrap($description, $length);
    }

    private function buildTagString(Tag $tag, int $level): string
    {
        $descriptionBeforePrefix = $prefix = \str_repeat(' ', \strlen($tag->name) + 2);
        $descriptionAfterPrefix = '';
        $description = $tag->description;

        if ($tag instanceof TypedTag) {
            $type = $this->pretty->print($tag->type) . ' ';
            $descriptionBeforePrefix .= \str_repeat(' ', \strlen($type));
            $descriptionAfterPrefix .= $type;
        }

        if ($tag instanceof NamedTypedTag) {
            $name = '$' . $tag->variable . ' ';
            $descriptionBeforePrefix .= \str_repeat(' ', \strlen($name));
            $descriptionAfterPrefix .= $name;
        }

        $description = $descriptionBeforePrefix . $description;
        $description = $this->formatDescription($description, $level);
        $description = \substr($description, \strlen($descriptionBeforePrefix));
        $description = $descriptionAfterPrefix . $description;

        $lines = \explode("\n", $description);

        foreach ($lines as $i => $line) {
            if ($i === 0) {
                $lines[$i] = \vsprintf('@%s %s', [$tag->name, $line]);
            } else {
                $lines[$i] = $prefix . $line;
            }
        }

        return \implode("\n", $lines);
    }

    /**
     * @param iterable<array-key, string> $segments
     *
     * @return iterable<array-key, string>
     */
    private function formatSegments(iterable $segments): iterable
    {
        yield '/**';

        foreach ($segments as $segment) {
            $segment = \str_replace("\r", '', $segment);
            $parts = \explode("\n", $segment);

            foreach ($parts as $part) {
                yield \rtrim(' * ' . $part);
            }
        }

        yield ' */';
    }

    public function buildRootCommentFromStatement(IRStatement $statement, int $level = 0): ?DocComment
    {
        $now = $this->clock->now();

        $block = $this->buildDocBlockFromStatement($statement);

        return $this->buildCommentFromDocBlock($block, $level);
    }

    public function buildCommentFromStatement(IRStatement $statement, int $level = 0): ?DocComment
    {
        $block = $this->buildDocBlockFromStatement($statement);

        return $this->buildCommentFromDocBlock($block, $level);
    }

    public function buildDocBlockFromStatement(IRStatement $statement): DocBlock
    {
        $result = $this->parseDescription($statement->description ?? '');

        if ($statement->deprecated !== null) {
            $result->addTag(new Tag('deprecated', $statement->deprecated));
        }

        if ($statement->since !== null) {
            $result->addTag(new Tag('since', $statement->since));
        }

        if ($statement->proposed) {
            $result->addTag(new Tag(
                name: 'internal',
                description: 'This is a proposed type, which means that the '
                    . 'implementation of this type is not final. Please use '
                    . 'this type at your own risk.',
            ));
        }

        return $result;
    }

    private function parseDescription(string $description): DocBlock
    {
        $tags = [];

        // Remove inner trailing tags
        $description = \preg_replace_callback(
            pattern: '/^\h*@(\w+)(?:\h+([^\n]+))?$/isum',
            callback: function (array $matches) use (&$tags): string {
                if ($matches[1] === 'proposed') {
                    return '';
                }

                $tags[] = new Tag($matches[1], $matches[2] ?? '');

                return '';
            },
            subject: $description,
        ) ?? $description;

        // Replace "{@link Some.type Description}" to "{@link Some::$type Description}"
        $description = \preg_replace_callback(
            pattern: '/{@link (\w+)\./isum',
            callback: function (array $matches): string {
                return '{@see ' . $matches[1] . '::$';
            },
            subject: $description,
        ) ?? $description;

        return new DocBlock(\trim($description), $tags);
    }
}
