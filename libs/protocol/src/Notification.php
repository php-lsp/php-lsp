<?php

namespace Lsp\Protocol;

#[\Attribute(\Attribute::TARGET_CLASS)]
class Notification
{
    /**
     * @param non-empty-string $method
     */
    public function __construct(public readonly string $method) {}
}
