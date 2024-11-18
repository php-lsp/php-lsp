<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Represents a reference to a command. Provides a title which will be used to
 * represent a command in the UI and, optionally,
 * an array of arguments which will be passed to the command handler function
 * when invoked.
 */
final class Command
{
    public function __construct(
        /**
         * Title of the command, like `save`.
         */
        public readonly string $title,
        /**
         * The identifier of the actual command handler.
         */
        public readonly string $command,
        /**
         * An optional tooltip.
         *
         * @since 3.18.0
         *
         * @internal This is a proposed type, which means that the
         *           implementation of this type is not final. Please use this type at
         *           your own risk.
         */
        public readonly ?string $tooltip = null,
        /**
         * Arguments that the command handler should be invoked with.
         *
         * @var list<mixed>|null
         */
        public readonly ?array $arguments = null,
    ) {}
}
