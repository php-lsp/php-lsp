<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Static registration options to be returned in the initialize request.
 *
 * @generated 2024-11-15
 */
final class StaticRegistrationOptions
{
    public function __construct(
        /**
         * The id used to register the request. The id can be used to deregister
         * the request again. See also Registration#id.
         */
        public readonly ?string $id = null,
    ) {}
}
