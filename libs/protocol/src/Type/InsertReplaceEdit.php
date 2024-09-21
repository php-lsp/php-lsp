<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A special text edit to provide an insert and a replace operation.
 *
 * @since 3.16.0
 *
 * @generated 2024-09-21
 */
final class InsertReplaceEdit
{
    public function __construct(
        /**
         * The string to be inserted.
         */
        public readonly string $newText,
        /**
         * The range if the insert is requested.
         */
        public readonly Range $insert,
        /**
         * The range if the replace is requested.
         */
        public readonly Range $replace,
    ) {}
}
