<?php

namespace Lsp\Protocol\Type;

/**
 * Represents a reference to a command. Provides a title which
 * will be used to represent a command in the UI and, optionally,
 * an array of arguments which will be passed to the command handler
 * function when invoked.
 *
 * @generated
 */
final class Command
{
    /**
     * @param list<mixed> $arguments
     */
    final public function __construct(
        public readonly string $title,
        public readonly string $command,
        public readonly array $arguments,
    ) {}
}