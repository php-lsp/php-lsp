<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-09-21
 */
final class CodeActionClientCapabilitiesCodeActionLiteralSupportCodeActionKind
{
    public function __construct(
        /**
         * The code action kind values the client supports. When this property
         * exists the client also guarantees that it will handle values outside
         * its set gracefully and falls back to a default value when unknown.
         *
         * @var list<CodeActionKind>
         */
        public readonly array $valueSet = [],
    ) {}
}
