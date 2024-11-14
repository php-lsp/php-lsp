<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Structure to capture a description for an error code.
 *
 * @since 3.16.0
 *
 * @generated 2024-11-14
 */
final class CodeDescription
{
    public function __construct(
        /**
         * An URI to open with more information about the diagnostic error.
         *
         * @var non-empty-string
         */
        public readonly string $href,
    ) {}
}
