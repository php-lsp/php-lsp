<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The parameters of a {@link ExecuteCommandRequest}.
 *
 * @generated 2024-09-21
 */
final class ExecuteCommandParams
{
    use WorkDoneProgressParamsMixin;

    /**
     * @param int<-2147483648, 2147483647>|string|null $workDoneToken an
     *        optional token that a server can use to report work done progress
     */
    public function __construct(
        /**
         * The identifier of the actual command handler.
         */
        public readonly string $command,
        /**
         * Arguments that the command should be invoked with.
         *
         * @var list<mixed>|null
         */
        public readonly ?array $arguments = null,
        int|string|null $workDoneToken = null,
    ) {
        $this->workDoneToken = $workDoneToken;
    }
}
