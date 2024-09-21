<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-09-21
 */
final class CompletionClientCapabilitiesCompletionList
{
    public function __construct(
        /**
         * The client supports the following itemDefaults on a completion list.
         *
         * The value lists the supported property names of the
         * `CompletionList.itemDefaults` object. If omitted no properties are
         * supported.
         *
         * @since 3.17.0
         *
         * @var list<string>|null
         */
        public readonly ?array $itemDefaults = null,
    ) {}
}
