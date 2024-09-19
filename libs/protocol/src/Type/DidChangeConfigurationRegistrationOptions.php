<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
final class DidChangeConfigurationRegistrationOptions
{
    /**
     * @param string|list<string>|null $section
     */
    final public function __construct(
        public readonly string|array|null $section = null,
    ) {}
}