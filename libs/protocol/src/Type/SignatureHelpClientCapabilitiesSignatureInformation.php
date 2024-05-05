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
        public readonly array $documentationFormat,
        public readonly object $parameterInformation,
        public readonly bool $activeParameterSupport,
    ) {}
}