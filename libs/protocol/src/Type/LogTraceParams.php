<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
final class LogTraceParams
{
    final public function __construct(
        public readonly string $message,
        public readonly string|null $verbose = null,
    ) {}
}