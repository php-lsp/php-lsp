<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 * @internal This class is an internal dependency of {@see SignatureHelpClientCapabilities}
 */
final class SignatureHelpClientCapabilitiesSignatureInformation
{
    /**
     * @param list<MarkupKind> $documentationFormat
     */
    final public function __construct(
        public readonly array $documentationFormat = null,
        public readonly object $parameterInformation = null,
        public readonly bool $activeParameterSupport = null,
    ) {}
}