<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Code action tags are extra annotations that tweak the behavior of a code
 * action.
 *
 * @since 3.18.0 - proposed
 */
enum CodeActionTag: int
{
    /**
     * Marks the code action as LLM-generated.
     */
    case LLMGenerated = 1;
}
