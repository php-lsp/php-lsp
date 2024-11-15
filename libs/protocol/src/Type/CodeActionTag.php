<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Code action tags are extra annotations that tweak the behavior of a code
 * action.
 *
 * @since 3.18.0 - proposed
 *
 * @generated 2024-11-15
 */
enum CodeActionTag: int
{
    /**
     * Marks the code action as LLM-generated.
     *
     * @var int<0, 2147483647>
     */
    case LLMGenerated = 1;
}
