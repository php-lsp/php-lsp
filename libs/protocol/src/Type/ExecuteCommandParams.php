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
     * @param list<mixed> $arguments
     * @param int<-2147483648, 2147483647>|string $workDoneToken
     */
    final public function __construct(
        public readonly string $command,
        public readonly array $arguments,
        int|string $workDoneToken,
    ) {
        $this->workDoneToken = $workDoneToken;
    }
}
