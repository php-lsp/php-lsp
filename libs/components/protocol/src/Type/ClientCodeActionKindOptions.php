<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @since 3.18.0
 */
final class ClientCodeActionKindOptions
{
    public function __construct(
        /**
         * The code action kind values the client supports. When this property
         * exists the client also guarantees that it will handle values outside
         * its set gracefully and falls back to a default value when unknown.
         *
         * @var list<CodeActionKind|non-empty-string>
         */
        public readonly array $valueSet = [],
    ) {}
}
