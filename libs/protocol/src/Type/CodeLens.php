<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A code lens represents a {@link Command command} that should be shown along
 * with source text, like the number of references, a way to run tests, etc.
 *
 * A code lens is _unresolved_ when no command is associated to it. For
 * performance reasons the creation of a code lens and resolving should be done
 * in two stages.
 *
 * @generated 2024-09-21
 */
final class CodeLens
{
    public function __construct(
        /**
         * The range in which this code lens is valid. Should only span a single
         * line.
         */
        public readonly Range $range,
        /**
         * The command this code lens represents.
         */
        public readonly ?Command $command = null,
        /**
         * A data entry field that is preserved on a code lens item between a
         * {@link CodeLensRequest} and a {@link CodeLensResolveRequest}.
         */
        public readonly mixed $data = null,
    ) {}
}
