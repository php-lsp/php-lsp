<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Static registration options to be returned in the initialize request.
 *
 * @generated 2024-09-21
 */
trait StaticRegistrationOptionsMixin
{
    /**
     * The id used to register the request. The id can be used to deregister the
     * request again. See also Registration#id.
     *
     * @readonly
     */
    public ?string $id = null;
}
