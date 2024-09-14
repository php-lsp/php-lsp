<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 *
 * @internal This class is an internal dependency of {@see CompletionList}
 */
final class CompletionListItemDefaults
{
    /**
     * @param list<string> $commitCharacters
     */
    final public function __construct(
        public readonly array $commitCharacters,
        public readonly Range|object $editRange,
        public readonly InsertTextFormat $insertTextFormat,
        public readonly InsertTextMode $insertTextMode,
        public readonly mixed $data,
    ) {}
}
