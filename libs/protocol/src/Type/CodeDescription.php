<?php

namespace Lsp\Protocol\Type;

/**
 * Structure to capture a description for an error code.
 *
 * @generated
 * @since 3.16.0
 */
final class CodeDescription
{
    /**
     * @param non-empty-string $href
     */
    final public function __construct(
        public readonly string $href,
    ) {}
}