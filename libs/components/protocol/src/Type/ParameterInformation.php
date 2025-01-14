<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Represents a parameter of a callable-signature. A parameter can have a label
 * and a doc-comment.
 */
final class ParameterInformation
{
    public function __construct(
        /**
         * The label of this parameter information.
         *
         * Either a string or an inclusive start and exclusive end offsets
         * within its containing signature label. (see
         * SignatureInformation.label). The offsets are based on a UTF-16 string
         * representation as `Position` and `Range` does.
         *
         * To avoid ambiguities a server should use the [start, end] offset
         * value instead of using a substring. Whether a client support this is
         * controlled via `labelOffsetSupport` client capability.
         *
         * *Note*: a label of type string should be a substring of its
         * containing signature label.
         * Its intended use case is to highlight the parameter label part in the
         * `SignatureInformation.label`.
         *
         * @var string|array{
         *          int<0, 2147483647>,
         *          int<0, 2147483647>
         *      }
         */
        public readonly string|array $label,
        /**
         * The human-readable doc-comment of this parameter. Will be shown in
         * the UI but can be omitted.
         */
        public readonly MarkupContent|string|null $documentation = null,
    ) {}
}
