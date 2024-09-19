<?php

namespace Lsp\Protocol\Type;

/**
 * Represents a diagnostic, such as a compiler error or warning. Diagnostic objects
 * are only valid in the scope of a resource.
 *
 * @generated
 */
final class Diagnostic
{
    /**
     * @param int<-2147483648, 2147483647>|string|null $code
     * @param list<DiagnosticTag>|null $tags
     * @param list<DiagnosticRelatedInformation>|null $relatedInformation
     */
    final public function __construct(
        public readonly Range $range,
        public readonly string $message,
        public readonly DiagnosticSeverity|null $severity = null,
        public readonly int|string|null $code = null,
        public readonly CodeDescription|null $codeDescription = null,
        public readonly string|null $source = null,
        public readonly array|null $tags = null,
        public readonly array|null $relatedInformation = null,
        public readonly mixed $data = null,
    ) {}
}