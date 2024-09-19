<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
final class WorkspaceEditClientCapabilities
{
    /**
     * @param list<ResourceOperationKind>|null $resourceOperations
     */
    final public function __construct(
        public readonly bool|null $documentChanges = null,
        public readonly array|null $resourceOperations = null,
        public readonly FailureHandlingKind|null $failureHandling = null,
        public readonly bool|null $normalizesLineEndings = null,
        public readonly WorkspaceEditClientCapabilitiesChangeAnnotationSupport|null $changeAnnotationSupport = null,
    ) {}
}