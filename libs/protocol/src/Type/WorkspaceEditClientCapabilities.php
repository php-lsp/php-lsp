<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
final class WorkspaceEditClientCapabilities
{
    /**
     * @generated
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
