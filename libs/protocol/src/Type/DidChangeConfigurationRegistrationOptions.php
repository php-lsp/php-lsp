<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
final class DidChangeConfigurationRegistrationOptions
{
    /**
     * @param string|list<string> $section
     */
    final public function __construct(
        public readonly string|array $section,
    ) {}
}