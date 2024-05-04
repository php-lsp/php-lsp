<?php

namespace Lsp\Protocol\Type;

/**
 * Represents a reference to a command. Provides a title which
 * will be used to represent a command in the UI and, optionally,
 * an array of arguments which will be passed to the command handler
 * function when invoked.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class Command
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @param list<mixed> $arguments
     */
    final public function __construct(
        public readonly string $title,
        public readonly string $command,
        public readonly array $arguments,
    ) {}
}
