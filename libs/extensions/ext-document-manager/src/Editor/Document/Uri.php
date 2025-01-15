<?php

declare(strict_types=1);

namespace Lsp\Extension\DocumentManager\Editor\Document;

final readonly class Uri implements \Stringable
{
    /**
     * @var non-empty-string|null
     */
    public ?string $pathname;

    public function __construct(
        /**
         * @var non-empty-string
         */
        public string $value,
    ) {
        $this->pathname = $this->parsePathname($this->value);
    }

    /**
     * @return non-empty-string|null
     */
    private function parsePathname(string $uri): ?string
    {
        if (\str_starts_with($uri, 'file://')) {
            $pathname = \substr($uri, 7);

            if ($pathname === '') {
                return null;
            }

            return $pathname;
        }

        return null;
    }

    /**
     * @return non-empty-string
     */
    public function __toString(): string
    {
        return $this->value;
    }
}
