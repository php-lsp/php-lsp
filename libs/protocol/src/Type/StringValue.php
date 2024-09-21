<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A string value used as a snippet is a template which allows to insert text
 * and to control the editor cursor when insertion happens.
 *
 * A snippet can define tab stops and placeholders with `$1`, `$2` and
 * `${3:foo}`. `$0` defines the final tab stop, it defaults to the end of the
 * snippet. Variables are defined with `$name` and `${name:default value}`.
 *
 * @since 3.18.0
 *
 * @internal This is a proposed type, which means that the implementation of
 *           this type is not final. Please use this type at your own risk.
 *
 * @generated 2024-09-21
 */
final class StringValue
{
    public function __construct(
        /**
         * The kind of string value.
         */
        public readonly string $kind,
        /**
         * The snippet string.
         */
        public readonly string $value,
    ) {}
}
