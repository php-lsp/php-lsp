<?php

declare(strict_types=1);

namespace Lsp\Workspace\Uri;

readonly class Uri implements \Stringable
{
    /**
     * @var non-empty-string
     */
    public const string LOCAL_TYPE = 'file';

    public function __construct(
        /**
         * @var non-empty-string
         */
        public string $path,
        /**
         * @var non-empty-lowercase-string
         */
        public ?string $type,
    ) {}

    /**
     * @param non-empty-string $path
     */
    public static function createLocal(string $path): self
    {
        return new self($path, self::LOCAL_TYPE);
    }

    /**
     * @return non-empty-string
     */
    public function __toString(): string
    {
        if ($this->type === null) {
            return $this->path;
        }

        return \sprintf('%s://%s', $this->type, $this->path);
    }
}
