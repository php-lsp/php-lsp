<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Represents a diagnostic, such as a compiler error or warning. Diagnostic
 * objects are only valid in the scope of a resource.
 *
 * @generated 2024-09-21
 */
final class Diagnostic
{
    public function __construct(
        /**
         * The range at which the message applies.
         */
        public readonly Range $range,
        /**
         * The diagnostic's message. It usually appears in the user interface.
         *
         * @since 3.18.0 - support for `MarkupContent`. This is guarded by the
         *        client capability `textDocument.diagnostic.markupMessageSupport`.
         */
        public readonly string|MarkupContent $message,
        /**
         * The diagnostic's severity. Can be omitted. If omitted it is up to the
         * client to interpret diagnostics as error, warning, info or hint.
         */
        public readonly ?DiagnosticSeverity $severity = null,
        /**
         * The diagnostic's code, which usually appear in the user interface.
         *
         * @var int<-2147483648, 2147483647>|string|null
         */
        public readonly int|string|null $code = null,
        /**
         * An optional property to describe the error code.
         * Requires the code field (above) to be present/not null.
         *
         * @since 3.16.0
         */
        public readonly ?CodeDescription $codeDescription = null,
        /**
         * A human-readable string describing the source of this diagnostic,
         * e.g. 'typescript' or 'super lint'. It usually appears in the user
         * interface.
         */
        public readonly ?string $source = null,
        /**
         * Additional metadata about the diagnostic.
         *
         * @since 3.15.0
         *
         * @var list<DiagnosticTag>|null
         */
        public readonly ?array $tags = null,
        /**
         * An array of related diagnostic information, e.g. when symbol-names
         * within a scope collide all definitions can be marked via this
         * property.
         *
         * @var list<DiagnosticRelatedInformation>|null
         */
        public readonly ?array $relatedInformation = null,
        /**
         * A data entry field that is preserved between a
         * `textDocument/publishDiagnostics` notification and
         * `textDocument/codeAction` request.
         *
         * @since 3.16.0
         */
        public readonly mixed $data = null,
    ) {}
}
