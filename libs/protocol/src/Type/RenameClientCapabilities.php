<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
final class RenameClientCapabilities
{
    final public function __construct(
        public readonly bool|null $dynamicRegistration = null,
        public readonly bool|null $prepareSupport = null,
        public readonly PrepareSupportDefaultBehavior|null $prepareSupportDefaultBehavior = null,
        public readonly bool|null $honorsChangeAnnotations = null,
    ) {}
}