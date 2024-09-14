<?php

namespace Lsp\Protocol\Type;

/**
 * An inlay hint label part allows for interactive and composite labels
 * of inlay hints.
 *
 * @generated
 *
 * @since 3.17.0
 */
final class InlayHintLabelPart
{
    final public function __construct(
        public readonly string $value,
        public readonly string|MarkupContent $tooltip,
        public readonly Location $location,
        public readonly Command $command,
    ) {}
}
