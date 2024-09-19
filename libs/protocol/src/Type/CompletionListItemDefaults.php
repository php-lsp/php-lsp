<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 * @internal This class is an internal dependency of {@see CompletionList}
 */
final class CompletionListItemDefaults
{
    /**
     * @param list<string> $commitCharacters
     */
    final public function __construct(
        public readonly array $commitCharacters = null,
        public readonly Range|object $editRange = null,
        public readonly InsertTextFormat $insertTextFormat = null,
        public readonly InsertTextMode $insertTextMode = null,
        public readonly mixed $data = null,
    ) {}
}