<?php

namespace Lsp\Protocol\Type;

/**
 * Static registration options to be returned in the initialize
 * request.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
abstract class StaticRegistrationOptions
{
    use StaticRegistrationOptionsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    public function __construct(string $id)
    {
        $this->id = $id;
    }
}
