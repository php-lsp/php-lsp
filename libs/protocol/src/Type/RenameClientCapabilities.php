<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
final class RenameClientCapabilities
{
    /**
     * @generated
     */
    final public function __construct(
        public readonly bool $dynamicRegistration,
        public readonly bool $prepareSupport,
        public readonly PrepareSupportDefaultBehavior $prepareSupportDefaultBehavior,
        public readonly bool $honorsChangeAnnotations,
    ) {}
}
