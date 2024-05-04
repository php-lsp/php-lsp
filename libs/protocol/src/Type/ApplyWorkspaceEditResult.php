<?php

namespace Lsp\Protocol\Type;

/**
 * The result returned from the apply workspace edit request.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.17 renamed from ApplyWorkspaceEditResponse
 */
final class ApplyWorkspaceEditResult
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.17 renamed from ApplyWorkspaceEditResponse
     * @param int<0, 2147483647> $failedChange
     */
    final public function __construct(
        public readonly bool $applied,
        public readonly string $failureReason,
        public readonly int $failedChange,
    ) {}
}
