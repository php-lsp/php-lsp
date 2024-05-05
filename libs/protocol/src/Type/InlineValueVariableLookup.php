<?php

namespace Lsp\Protocol\Type;

/**
 * Provide inline value through a variable lookup.
 * If only a range is specified, the variable name will be extracted from the underlying document.
 * An optional variable name can be used to override the extracted name.
 *
 * @generated
 * @since 3.17.0
 */
final class InlineValueVariableLookup
{
    final public function __construct(
        public readonly Range $range,
        public readonly string $variableName,
        public readonly bool $caseSensitiveLookup,
    ) {}
}
