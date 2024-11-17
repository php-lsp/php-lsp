<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @since 3.18.0 - proposed
 */
final class CodeActionTagOptions
{
    public function __construct(
        /**
         * The tags supported by the client.
         *
         * @var list<CodeActionTag>
         */
        public readonly array $valueSet = [],
    ) {}
}
