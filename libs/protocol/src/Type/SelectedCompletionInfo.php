<?php

namespace Lsp\Protocol\Type;

/**
 * Describes the currently selected completion item.
 *
 * @generated
 * @since 3.18.0
 * @internal Describes the upcoming version of the Language Server Protocol and is under development
 */
final class SelectedCompletionInfo
{
    final public function __construct(
        public readonly Range $range,
        public readonly string $text,
    ) {}
}