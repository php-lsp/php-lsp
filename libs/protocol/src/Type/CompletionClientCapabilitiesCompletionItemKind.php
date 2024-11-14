<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-11-14
 */
final class CompletionClientCapabilitiesCompletionItemKind
{
    public function __construct(
        /**
         * The completion item kind values the client supports. When this
         * property exists the client also guarantees that it will handle values
         * outside its set gracefully and falls back to a default value when
         * unknown.
         *
         * If this property is not present the client only supports the
         * completion items kinds from `Text` to `Reference` as defined in the
         * initial version of the protocol.
         *
         * @var list<CompletionItemKind>|null
         */
        public readonly ?array $valueSet = null,
    ) {}
}
