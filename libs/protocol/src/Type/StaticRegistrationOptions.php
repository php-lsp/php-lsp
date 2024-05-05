<?php

namespace Lsp\Protocol\Type;

/**
 * Static registration options to be returned in the initialize
 * request.
 *
 * @generated
 */
abstract class StaticRegistrationOptions
{
    use StaticRegistrationOptionsMixin;

    function __construct(string $id)
    {
            $this->id = $id;
    }
}