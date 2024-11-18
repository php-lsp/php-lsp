<?php

declare(strict_types=1);

namespace Lsp\Contracts\Server;

interface AddressInterface extends \Stringable
{
    /**
     * Retrieve the scheme component of the address.
     *
     * An address scheme cannot be empty.
     *
     * The value returned MUST be normalized to lowercase,
     * per RFC-3986 (Section 3.1).
     *
     * @link https://datatracker.ietf.org/doc/html/rfc3986#section-3.1
     *
     * @return non-empty-lowercase-string
     */
    public function getScheme(): string;

    /**
     * Address may be represented as a non-empty string.
     *
     * @return non-empty-string
     */
    public function __toString(): string;
}
