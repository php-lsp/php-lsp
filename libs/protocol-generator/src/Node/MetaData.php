<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Node;

final class MetaData extends Node
{
    /**
     * @param string $version The protocol version.
     */
    public function __construct(
        public string $version,
    ) {
        parent::__construct();
    }

    /**
     * @param array{version: string} $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            version: $data['version'],
        );
    }
}
