<?php

namespace Lsp\Protocol\Type;

/**
 * An inlay hint label part allows for interactive and composite labels
 * of inlay hints.
 *
 * @generated
 * @since 3.17.0
 */
final class InlayHintLabelPart
{
    final public function __construct(
        public readonly string $value,
        public readonly string|MarkupContent|null $tooltip = null,
        public readonly Location|null $location = null,
        public readonly Command|null $command = null,
    ) {}
}