<?php

namespace Lsp\Protocol\Type;

/**
 * A code lens represents a {@link Command command} that should be shown along with
 * source text, like the number of references, a way to run tests, etc.
 *
 * A code lens is _unresolved_ when no command is associated to it. For performance
 * reasons the creation of a code lens and resolving should be done in two stages.
 *
 * @generated
 */
final class CodeLens
{
    final public function __construct(
        public readonly Range $range,
        public readonly Command $command,
        public readonly mixed $data,
    ) {}
}