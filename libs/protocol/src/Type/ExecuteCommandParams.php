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
     * @param list<mixed>|null $arguments
     * @param int<-2147483648, 2147483647>|string|null $workDoneToken
     */
    final public function __construct(
        public readonly string $command,
        public readonly array|null $arguments = null,
        int|string|null $workDoneToken = null,
    ) {
            $this->workDoneToken = $workDoneToken;
    }
}