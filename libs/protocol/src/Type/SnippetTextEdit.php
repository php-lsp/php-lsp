<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * An interactive text edit.
 *
 * @since 3.18.0
 *
 * @internal This is a proposed type, which means that the implementation of
 *           this type is not final. Please use this type at your own risk.
 *
 * @generated 2024-11-14
 */
final class SnippetTextEdit
{
    public function __construct(
        /**
         * The range of the text document to be manipulated.
         */
        public readonly Range $range,
        /**
         * The snippet to be inserted.
         */
        public readonly StringValue $snippet,
        /**
         * The actual identifier of the snippet edit.
         */
        public readonly ?string $annotationId = null,
    ) {}
}
