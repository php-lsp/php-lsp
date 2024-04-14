<?php

declare(strict_types=1);

namespace Lsp\Hydrator\JMS\Exception;

/**
 * @internal This is an internal library class, please do not use it in your code.
 * @psalm-internal Lsp\Hydrator\JMS
 */
final class Context
{
    /**
     * @param non-empty-string $expected Expected type string representation.
     * @param non-empty-string|null $actual Actual type string representation.
     * @param list<non-empty-string> $path Path to the failed field.
     */
    public function __construct(
        public readonly string $expected,
        public readonly ?string $actual = null,
        public readonly array $path = [],
    ) {}

    /**
     * @param mixed $value
     *
     * @return non-empty-string
     */
    public static function getPublicTypeName(mixed $value): string
    {
        if (\is_array($value)) {
            return \array_is_list($value) ? 'array' : 'object';
        }

        if (\is_object($value)) {
            return 'object';
        }

        /** @var non-empty-string */
        return \get_debug_type($value);
    }
}
