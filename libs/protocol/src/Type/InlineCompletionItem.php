<?php

namespace Lsp\Protocol\Type;

/**
 * An inline completion item represents a text snippet that is proposed inline to complete text that is being typed.
 *
 * @generated
 * @since 3.18.0
 * @internal Describes the upcoming version of the Language Server Protocol and is under development
 */
final class InlineCompletionItem
{
    final public function __construct(
        public readonly string|StringValue $insertText,
        public readonly string|null $filterText = null,
        public readonly Range|null $range = null,
        public readonly Command|null $command = null,
    ) {}
}