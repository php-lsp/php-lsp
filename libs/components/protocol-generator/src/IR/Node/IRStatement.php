<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\IR\Node;

abstract class IRStatement extends IRNode
{
    /**
     * Contains optional mutable description.
     */
    public ?string $description = null;

    /**
     * Contains deprecation reason.
     */
    public ?string $deprecated = null;

    /**
     * Contains since version string.
     *
     * @var non-empty-string|null
     */
    public ?string $since = null;

    /**
     * Experimental if {@see true}.
     */
    public bool $proposed = false;

    /**
     * @param non-empty-string $name
     */
    public function __construct(
        public readonly string $name,
    ) {
        parent::__construct();
    }
}
