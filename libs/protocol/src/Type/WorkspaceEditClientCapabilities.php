<?php

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-05-04T17:58:12+00:00
 */
final class WorkspaceEditClientCapabilities
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @param list<ResourceOperationKind> $resourceOperations
     */
    final public function __construct(
        public readonly bool $documentChanges,
        public readonly array $resourceOperations,
        public readonly FailureHandlingKind $failureHandling,
        public readonly bool $normalizesLineEndings,
        public readonly object $changeAnnotationSupport,
    ) {}
}
