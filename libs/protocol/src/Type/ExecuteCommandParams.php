<?php

namespace Lsp\Protocol\Type;

/**
 * The parameters of a {@link ExecuteCommandRequest}.
 *
 * @generated
 */
final class ExecuteCommandParams
{
    use WorkDoneProgressParamsMixin;

    /**
     * @generated
     * @param list<mixed> $arguments
     */
    final public function __construct(
        public readonly string $command,
        public readonly array $arguments,
        int|string $workDoneToken,
    ) {
        $this->workDoneToken = $workDoneToken;
    }
}
