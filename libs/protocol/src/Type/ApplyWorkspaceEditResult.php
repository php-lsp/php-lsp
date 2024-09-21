<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The result returned from the apply workspace edit request.
 *
 * @since 3.17 renamed from ApplyWorkspaceEditResponse
 *
 * @generated 2024-09-21
 */
final class ApplyWorkspaceEditResult
{
    public function __construct(
        /**
         * Indicates whether the edit was applied or not.
         */
        public readonly bool $applied,
        /**
         * An optional textual description for why the edit was not applied.
         * This may be used by the server for diagnostic logging or to provide a
         * suitable error for a request that triggered the edit.
         */
        public readonly ?string $failureReason = null,
        /**
         * Depending on the client's failure handling strategy `failedChange`
         * might contain the index of the change that failed. This property is
         * only available if the client signals a `failureHandlingStrategy` in
         * its client capabilities.
         *
         * @var int<0, 2147483647>|null
         */
        public readonly ?int $failedChange = null,
    ) {}
}
