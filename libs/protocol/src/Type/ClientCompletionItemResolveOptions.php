<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @since 3.18.0
 */
final class ClientCompletionItemResolveOptions
{
    public function __construct(
        /**
         * The properties that a client can resolve lazily.
         *
         * @var list<string>
         */
        public readonly array $properties = [],
    ) {}
}
