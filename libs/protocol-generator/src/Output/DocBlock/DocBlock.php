<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Output\DocBlock;

final class DocBlock
{
    /**
     * @var list<non-empty-string>
     */
    private const NON_UNIQUE_TAGS = [
        'param',
        'throws',
        'template',
        'template-extends',
        'extends',
        'template-implements',
        'implements',
    ];

    /**
     * @var non-empty-string|null
     */
    public readonly ?string $description;

    /**
     * @var list<Tag>
     */
    public array $tags = [];

    /**
     * @param iterable<array-key, Tag> $tags
     */
    public function __construct(
        ?string $description = null,
        iterable $tags = [],
    ) {
        $this->description = self::formatDescription($description);

        foreach ($tags as $tag) {
            $this->addTag($tag);
        }
    }

    public function addTag(Tag $tag): void
    {
        $shouldByUnique = !\in_array($tag->name, self::NON_UNIQUE_TAGS, true);

        if ($shouldByUnique) {
            foreach ($this->tags as $i => $actual) {
                if ($actual->name === $tag->name) {
                    // @phpstan-ignore-next-line
                    $this->tags[$i] = $tag;

                    return;
                }
            }
        }

        $this->tags[] = $tag;
    }

    /**
     * @return non-empty-string|null
     */
    private static function formatDescription(?string $description): ?string
    {
        if ($description === null) {
            return null;
        }

        $description = \trim($description);

        return $description === '' ? null : $description;
    }

    public function isEmpty(): bool
    {
        return $this->description === null
            && $this->tags === [];
    }
}
