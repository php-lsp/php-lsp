<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Represents a parameter of a callable-signature. A parameter can have a label
 * and a doc-comment.
 *
 * @generated 2024-11-14
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
        public readonly string|array $label = [],
        /**
         * The human-readable doc-comment of this parameter. Will be shown in
         * the UI but can be omitted.
         */
        public readonly string|MarkupContent|null $documentation = null,
    ) {}
}
