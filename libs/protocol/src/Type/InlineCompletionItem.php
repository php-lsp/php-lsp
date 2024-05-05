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
        public readonly string $filterText,
        public readonly Range $range,
        public readonly Command $command,
    ) {}
}