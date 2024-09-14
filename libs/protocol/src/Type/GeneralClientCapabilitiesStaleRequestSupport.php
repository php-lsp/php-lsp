<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 *
 * @internal This class is an internal dependency of {@see GeneralClientCapabilities}
 */
final class GeneralClientCapabilitiesStaleRequestSupport
{
    /**
     * @param list<string> $retryOnContentModified
     */
    final public function __construct(
        public readonly bool $cancel,
        public readonly array $retryOnContentModified,
    ) {}
}
