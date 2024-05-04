<?php

namespace Lsp\Protocol\Type;

/**
 * The parameters of a {@link ExecuteCommandRequest}.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class ExecuteCommandParams
{
    use WorkDoneProgressParamsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
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
