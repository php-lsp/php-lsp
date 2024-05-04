<?php

namespace Lsp\Protocol\Type;

/**
 * Describes the currently selected completion item.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.18.0
 * @internal Describes the upcoming version of the Language Server Protocol and is under development
 */
final class SelectedCompletionInfo
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.18.0
     * @internal Describes the upcoming version of the Language Server Protocol and is under development
     */
    final public function __construct(
        public readonly Range $range,
        public readonly string $text,
    ) {}
}
