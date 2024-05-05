<?php

namespace Lsp\Protocol\Type;

/**
 * A special text edit to provide an insert and a replace operation.
 *
 * @generated
 * @since 3.16.0
 */
final class InsertReplaceEdit
{
    /**
     * @generated
     * @since 3.16.0
     */
    final public function __construct(
        public readonly string $newText,
        public readonly Range $insert,
        public readonly Range $replace,
    ) {}
}
