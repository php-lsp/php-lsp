<?php

declare(strict_types=1);

namespace Lsp\Extension\DocumentManager\Editor\Document;

final class Uri implements \Stringable
{
    public function __construct(
        /**
         * @var non-empty-string
         */
        private readonly string $value,
    ) {}

    /**
     * @return non-empty-string
     */
    public function __toString(): string
    {
        return $this->value;
    }
}
