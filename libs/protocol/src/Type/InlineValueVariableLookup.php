<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Provide inline value through a variable lookup.
 * If only a range is specified, the variable name will be extracted from the
 * underlying document.
 * An optional variable name can be used to override the extracted name.
 *
 * @since 3.17.0
 *
 * @generated 2024-09-21
 */
final class InlineValueVariableLookup
{
    public function __construct(
        /**
         * The document range for which the inline value applies.
         * The range is used to extract the variable name from the underlying
         * document.
         */
        public readonly Range $range,
        /**
         * How to perform the lookup.
         */
        public readonly bool $caseSensitiveLookup,
        /**
         * If specified the name of the variable to look up.
         */
        public readonly ?string $variableName = null,
    ) {}
}
